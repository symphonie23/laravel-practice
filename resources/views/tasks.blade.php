<head>
    <title>Homepage</title>
    <!-- Add the Bootstrap stylesheet -->
    <!-- ajax -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>    
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
</head>

@extends('layouts.app')

@section('content')

    <div class="container">
        @auth
        <div class="panel-body">
            @include('common.errors')

            <form action="{{ url('task') }}" method="POST" class="form-horizontal">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="task" class="col-sm-3 control-label">Task Name:</label>

                    <div class="col-sm-6">
                        <input type="text" name="name" id="task-name" class="form-control">
                    </div>
                </div>

                <br>

                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-6">
                        <button type="submit" class="btn btn-outline-primary" onclick="showCreateTaskModal()">
                            <i class="fa fa-plus"></i> Add a Task
                        </button>
                    </div>
                </div>
            </form>
        </div>

        @else
            <p>Please <a href="{{ route('login') }}">login</a> or <a href="{{ route('register') }}">register</a> to add a task.</p>
        @endauth

        <br>

        

        <button type="submit">Submit</button>
        <script>
            $(document).ready(function() {
                $('#add-task-btn').click(function() {
                    $('#myForm').submit();
                    $('#myModal').modal('hide');
                });
            });
        </script>

@if (count($tasks) > 0)
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2>Current Tasks</h2>
                </div>

                <div class="panel-body">
                    <table class="table table-striped task-table">
                        <thead>
                            <th>Tasks</th>
                            <th>&nbsp;</th>
                        </thead>

                        <tbody class="tbody">
                            @foreach ($tasks as $task)
                                <tr>
                                    <td class="table-text">
                                        <div>{{ $task->name }}</div>
                                    </td>

                                    <td class="delete-button">
                                        <form action="{{ url('task/'.$task->id) }}" method="POST" id="delete-task-{{ $task->id }}">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            
                                            <button type="submit" class="btn btn-danger delete-task" data-task-id="{{ $task->id }}">
                                                <i class="fa fa-trash"></i> Remove Task
                                            </button>
                                        </form>
                                    </td>
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

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>jQuery UI Dialog functionality</title>
    <link
      href="https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css"
      rel="stylesheet"
    />
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

    <!-- CSS -->
    <style>
      .ui-widget-header,
      .ui-state-default,
      ui-button {
        background: #b9cd6d;
        border: 1px solid #b9cd6d;
        color: #ffffff;
        font-weight: bold;
      }
    </style>

    <!-- Javascript -->
    <script>
      $(function () {
        $("#dialog-1").dialog({
          autoOpen: false,
        });
        $("#opener").click(function () {
          $("#dialog-1").dialog("open");
        });
      });
    </script>
  </head>

  <body>
    <!-- HTML -->
    <div id="dialog-1" title="Add a Task">
      <form action="{{ url('task') }}" method="POST" class="form-horizontal">
        {{ csrf_field() }}

        <div class="form-group">
          <label for="task" class="col-sm-3 control-label">Task Name:</label>

          <div class="col-sm-6">
            <input
              type="text"
              name="name"
              id="task-name"
              class="form-control"
            />
          </div>
        </div>

        <br />

        <div class="form-group">
          <div class="col-sm-offset-3 col-sm-6">
            <button
              type="submit"
              class="btn btn-outline-primary"
              onclick="showCreateTaskModal()"
            >
              <i class="fa fa-plus"></i> Confirm
            </button>
          </div>
        </div>
      </form>
    </div>
    <button id="opener">Adddddd</button>
  </body>
</html>
