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
        $errormsg;

        if($completed == 0) {
          $completed = "false";
        } else {
          $completed = "true";
        }

        // TODO: Implement me!
        // This action should update a specific todo item in the todos table using the TodoItem::updateTodo method.
        // Try and figure out what parameters you need to pass to the updateTodo-method in the TodoItem model.
        $result = TodoItem::updateTodo($todoId, $title, $completed);

        // if there's a result
          // use the redirect method to send the user back to the list of todos $this->redirect('/');
        // otherwise, throw an exception or show an error message
        if($result) {
          $this->redirect('/');
        }
        
        throw new Exception('Something went wrong');
        
    }

    public function delete($urlParams)
    {
      // TODO: Implement me!
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
      // (OPTIONAL) TODO: This action should toggle all todos to completed, or not completed.
    }

    public function clear($urlParams)
    {
      // (OPTIONAL) TODO: This action should remove all completed todos from the table.
      $todoId = $urlParams['id'];

      $result = TodoItem::clearCompletedTodos($todoId);

      if($result) {
        $this->redirect('/');
      }
    }

}
