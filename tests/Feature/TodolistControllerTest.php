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

    public function testAddTodoFailed() {
        $this->withSession([
            "user" => "putra"
        ])->post("/todolist", [])
            ->assertSeeText("Todo is required");
    }

    public function testAddTodoSuccess() {
        $this->withSession([
            "user" => "putra"
        ])->post("/todolist", [
            "todo" => "acla"
        ])->assertRedirect("/todolist");
    }

    public function testRemoveTodolist() {
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
        ])->post("/todolist/1/delete")
            ->assertRedirect("/todolist");

    }
}
