@extends('layouts.app')
@section('content')
    <div class="project-header text-center mb-5">
        <h1 class="display-4 fw-bold mb-3">Информационная система размещения частных объявлений</h1>
    </div>

    <div class="row mb-2">
        <div class="col-md-6 mb-4">
            <div class="card h-100 shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h3 class="mb-0"><i class="bi bi-info-circle me-2"></i>О проекте</h3>
                </div>
                <div class="card-body">
                    <p>Система разработана в рамках курсовой работы по дисциплине "WEB-программирование".</p>
                    <p>Проект представляет собой тестовую платформу для размещения частных объявлений с
                        возможностью регистрации пользователей, публикации объявлений и их категорий.</p>
                </div>
            </div>
        </div>

        <div class="col-md-6 mb-4">
            <div class="card h-100 shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h3 class="mb-0"><i class="bi bi-gear me-2"></i>Технологии</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-6 mb-3">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-server me-2 text-primary"></i>
                                <span>Laravel 11</span>
                            </div>
                        </div>
                        <div class="col-6 mb-3">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-database me-2 text-primary"></i>
                                <span>MySQL 8.0</span>
                            </div>
                        </div>
                        <div class="col-6 mb-3">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-window me-2 text-primary"></i>
                                <span>OpenServer</span>
                            </div>
                        </div>
                        <div class="col-6 mb-3">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-bootstrap me-2 text-primary"></i>
                                <span>Bootstrap 5</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow-sm mb-2">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0"><i class="bi bi-list-check me-2"></i>Функционал системы</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 mb-3">
                    <div class="d-flex">
                        <div class="me-3 text-primary">
                            <i class="bi bi-file-earmark-plus fs-4"></i>
                        </div>
                        <div>
                            <h5>Публикация объявлений</h5>
                            <ul class="list-unstyled">
                                <li><i class="bi bi-check-circle text-success me-2"></i>Создание/редактирование</li>
                                <li><i class="bi bi-check-circle text-success me-2"></i>Категоризация</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="d-flex">
                        <div class="me-3 text-primary">
                            <i class="bi bi-people fs-4"></i>
                        </div>
                        <div>
                            <h5>Пользовательская система</h5>
                            <ul class="list-unstyled">
                                <li><i class="bi bi-check-circle text-success me-2"></i>Регистрация/авторизация</li>
                                <li><i class="bi bi-check-circle text-success me-2"></i>Управление объявлениями</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
