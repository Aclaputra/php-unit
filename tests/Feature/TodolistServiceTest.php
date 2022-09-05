<?php

namespace Tests\Feature;

use App\Services\TodolistService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Session;

class TodolistServiceTest extends TestCase
{
    private TodolistService $todolistService;

    protected function setUp():void {
        parent::setUp();
        
        $this->todolistService = $this->app->make(TodolistService::class);
    }

    public function testTodolistNotNull() {
        self::assertNotNull($this->todolistService);
    }

    public function testSaveTodo() {
        $this->todolistService->saveTodo("1", "acla");

        $todolist = Session::get("todolist");
        foreach ($todolist as $value) {
            self::assertEquals("1", $value['id']);
            self::assertEquals("acla", $value['todo']);
        }
    }

    public function testGetTodolistEmpty() {
        self::assertEquals([], $this->todolistService->getTodolist());
    }

    public function testGetTodolistNotEmpty() {
        $expected = [
            [
              "id" => "1",
              "todo" => "acla"
            ],
            [
              "id" => "2",
              "todo" => "putra"
            ]
        ];

        $this->todolistService->saveTodo("1", "acla");
        $this->todolistService->saveTodo("2", "putra");

        self::assertEquals($expected, $this->todolistService->getTodolist());
    }
}
