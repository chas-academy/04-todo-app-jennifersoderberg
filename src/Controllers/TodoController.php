<?php

use Todo\Controller;
use Todo\Database;
use Todo\TodoItem;

class TodoController extends Controller {
    
    public function get()
    {
        $todos = TodoItem::findAll();
        return $this->view('index', ['todos' => $todos]);
    }

    public function add()
    {
        $body = filter_body();
        $result = TodoItem::createTodo($body['title']);

        if ($result) {
          $this->redirect('/');
        }
    }

    public function update($urlParams)
    {
        $body = filter_body(); // gives you the body of the request (the "envelope" contents)
        $todoId = $urlParams['id']; // the id of the todo we're trying to update
        $completed = isset($body['status']) ? 1 : 0; // whether or not the todo has been checked or not
        $title = $body['title'];

        if($completed == 0) {
          $completed = "false";
        } else {
          $completed = "true";
        }

        $result = TodoItem::updateTodo($todoId, $title, $completed);

        if($result) {
          $this->redirect('/');
        }
        throw new Exception('Something went wrong');
    }

    public function delete($urlParams)
    {
        $todoId = $urlParams['id'];
        $result = TodoItem::deletetodo($todoId);

        if($result) {
          $this->redirect('/');
        }
    }

    /**
     * OPTIONAL Bonus round!
     * 
     * The two methods below are optional, feel free to try and complete them
     * if you're aiming for a higher grade.
     */
    public function toggle()
    {        
      $todos = TodoItem::findAll();

      $counter = count(array_filter($todos, function ($todo) {
        return $todo['completed'] === "false";
      }));

      if($counter > 0) {
        $completed = 2;
      } else {
        $completed = 1;
      }

      $result = TodoItem::toggleTodos($completed);

      if($result) {
        $this->redirect('/');
      }
    }

    public function clear($urlParams)
    {
        $todoId = $urlParams['id'];
        $result = TodoItem::clearCompletedTodos($todoId);

        if($result) {
          $this->redirect('/');
        }
    }

}
