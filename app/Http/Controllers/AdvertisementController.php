<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AdvertisementController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $perPage = request()->input('perPage', 5);
         $ads = Advertisement::with('category')->paginate($perPage)->appends(request()->query());
        return view('ads', compact('ads'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (! Gate::allows('create-item')) {
            return back()->with('danger', 'У вас нет разрешения на добавление объявлений');
        }

        $form = [
            'action' => route('advertisements.store'),
            'method' => 'POST',
            'fields' => (new Advertisement)->formFields()
        ];
        return view('add_advertisement', compact('form'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        if (! Gate::allows('create-item')) {
            return back()->with('danger', 'У вас нет разрешения на добавление объявлений');
        }

        $validated = $request->validate([
            'name' => 'required|max:255|min:3',
            'photo' => 'required|max:255|min:10',
            'price' => 'required|integer',
            'category_id' => 'required|integer',
            'city_id' => 'required|integer',
        ]);

        $advertisement = new Advertisement($validated);
        $advertisement->user_id = 1; // По дефолту для таблиц будет первый пользователь, так как не используем авторизацию
        $advertisement->save();
        return redirect(route('advertisements.index'))->with('success', 'Объявление добавлено успешно!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $advertisement = Advertisement::with(['messages', 'category'])->where('id', $id)->get()->first();
        return view('advertisement', compact('advertisement'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $advertisement = Advertisement::with('category')->where('id', $id)->get()->first();
        $form = false;
        if ($advertisement) $form = [
            'action' => route('advertisements.update', $id),
            'method' => 'PUT',
            'fields' => $advertisement->formFields()
        ];

        return view('edit_advertisement', compact('advertisement', 'form'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'photo' => 'required|max:255|min:10',
            'price' => 'required|integer',
            'category_id' => 'required|integer',
            'city_id' => 'required|integer',
        ]);

        $advertisement = Advertisement::find($id);
        foreach ($validated as $field => $value) {
            $advertisement->$field = $value;
        }
        $advertisement->save();
        return redirect(route('advertisements.index'))->with('success', 'Объявление обновлено успешно!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (! Gate::allows('destroy-item')) {
            return back()->with('danger', 'У вас нет разрешения на удаление объявления номер ' . $id);
        }
        Advertisement::destroy($id);
        return redirect(route('advertisements.index'))->with('success', 'Объявление удалено успешно!');
    }
}
