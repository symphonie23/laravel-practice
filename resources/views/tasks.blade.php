@extends('layouts.app')

@section('content')

    <div class="container" style="width=100px; margin-left=50%; border-style:solid;">
        @auth
        <div class="panel-body">
            @include('common.errors')

            <form action="{{ url('task') }}" method="POST" class="form-horizontal">
                {{ csrf_field() }}

                <br>

            </form>
        </div>

        @else
            <p>Please <a href="{{ route('login') }}">login</a> or <a href="{{ route('register') }}">register</a> to add a task.</p>
        @endauth

        <br>

@if (count($tasks) > 0)
            <div class="panel panel-default">
                <div class="panel-heading">
                    <center><h2>Current Tasks</h2></center>
                </div>
                <hr>
                
                    
                        <table class="table table-hover">
                            <thead>
                                <th class="col-3">Task Names</th>
                                <!--to do-->
                                <th class="col-6">Information</th>
                                <th class="col-3">Action</th>
                            </thead>

                            <div class="container">
                                <tbody class="tbody">
                                    @foreach ($tasks as $task)
                                        <tr id="tr">
                                            <div class="row">
                                                <td style="vertical-align:middle;">
                                                    <div>{{ $task->name }}</div>
                                                </td>

                                                <!--to do-->
                                                <td style="vertical-align:middle;">
                                                    <div>{{ $task->name }}</div>
                                                </td>

                                            <td style="display:flex; justify-content:center; padding-top:8px;">
                                                <form action="{{ url('task/'.$task->id) }}" method="POST" id="delete-task-{{ $task->id }}">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                    <br>
                                                    <button type="submit" class="btn btn-danger delete-task" data-task-id="{{ $task->id }}">
                                                        <i class="fa fa-trash"></i> Remove Task
                                                    </button>
                                                </form>
                                            </td>
                                        </div>
                                    </tr>
                                @endforeach
                            </tbody>
                    </table>
                </div>
            </div>
        @endif
    </div>
    </form>
</div>
@endsection

<html lang="en">

  <body>
    <!-- HTML -->
    <div id="dialog-1" title="Add a Task">
      <form action="{{ url('task') }}" method="POST" class="form-horizontal">
        {{ csrf_field() }}

        <div class="form-group" >
          <label for="task" class="col-sm-3 control-label" style="width:1000px;">Task Name:</label>

          <br>
          <br>

            <input
              type="text"
              name="name"
              id="task-name"
              class="form-control"
            />
          
        </div>

        <br>

        <div class="form-group" >
          <label for="task" class="col-sm-3 control-label" style="width:1000px;">Information:</label>

          <br>
          <br>

            <input
              type="text"
              name="name"
              id="task-name"
              class="form-control"
            />
          
        </div>

        <div class="form-group">
          <div class="col-sm-offset-3 col-sm-6">

          <br>
            <button
              type="submit"
              class="btn btn-outline-primary"
              onclick="showCreateTaskModal()"
            >
                <!--show an alert box after adding task
                <script>
                    function showCreateTaskModal()
                    {
                    alert("You have successfully\nadded a task!");
                    }
                </script>
                -->
              <i class="fa fa-plus"></i> Confirm
            </button>
          </div>
        </div>
      </form>
    </div>
    <button id="opener" style="position: absolute; top: 120px; left:50%; width:auto; height:35px; border-radius:10px; transform: translate(-50%, -50%);" class="btn btn-primary">Add Task</button>
    


    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Add Task Here</button>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<form action="{{ url('task') }}" method="POST"  class="form-horizontal">
        {{ csrf_field() }}
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add a Task</h1>
        
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="mb-3">
            <label for="task" class="col-form-label">Task Name:</label>
            <input type="text" name="name" class="form-control" id="task-name">
          </div>
          <div class="mb-3">
            <label for="information" class="col-form-label">Information:</label>
            <textarea name="name" class="form-control" id="information"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" onclick="showCreateTaskModal()">Submit Task</button>
      </div>
    </div>
  </div>
</div>



  </body>
</html>
