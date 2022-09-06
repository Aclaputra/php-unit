<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TodolistControllerTest extends TestCase
{
    public function testTodolist() {
        $this->withSession([
            "user" => "putra",
            "todolist" => [
                [
                  "id" => "1",
                  "todo" => "acla"
                ],
                [
                  "id" => "2",
                  "todo" => "putra"
                ]
            ]
        ])->get('/todolist')
            ->assertSeeText("1")
            ->assertSeeText("acla")
            ->assertSeeText("2")
            ->assertSeeText("putra");
    }
}
