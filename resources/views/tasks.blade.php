@extends('layouts.app')

@section('content')

    <div class="container" style="width=100px; margin-left=50%; border-style:solid; background-color:#E9D3C0;">
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
                                                <td style="vertical-align:middle; border-left:2px solid beige;">
                                                    <div>{{ $task->name }}</div>
                                                </td>

                                                <!--to do-->
                                                <td style="vertical-align:middle; border-left:2px solid beige;">
                                                    <div>{{ $task->name }}</div>
                                                </td>

                                                <td style="display:flex; justify-content:center; padding-top:8px; border-left:2px solid beige; border-right:2px solid beige;">
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
                <!--show an alert box after adding task-->
                <script>
                    function showCreateTaskModal()
                    {
                    alert("You have successfully\nadded a task!");
                    }
                </script>
              <i class="fa fa-plus"></i> Confirm
            </button>
          </div>
        </div>
      </form>
    </div>
    <button id="opener" style="position: absolute; top: 120px; left:50%; width:auto; height:35px; border-radius:10px; transform: translate(-50%, -50%);" class="btn btn-primary">Add Task</button>
    
  </body>
</html>

