<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use Illuminate\Http\Request;

class AdvertisementController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ads = Advertisement::with('category')->get();
        return view('ads', compact('ads'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
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
        return redirect(route('advertisements.index'));
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
        return redirect(route('advertisements.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Advertisement::destroy($id);
        return redirect(route('advertisements.index'));
    }
}
