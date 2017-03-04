<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Todolist System</title>
        <link rel="stylesheet" href="{{asset('css/bootstrap-datepicker.min.css')}}"/>
        <link rel="stylesheet" href="{{mix('css/app.css')}}"/>
        <script>
            window.Laravel = '{{json_encode(["csrfToken"=>csrf_token()])}}';
        </script>
        <script type="text/javascript" src="{{mix('js/manifest.js')}}"></script>
        <script type="text/javascript" src="{{mix('js/vendor.js')}}"></script>
        <script type="text/javascript" src="{{mix('js/app.js')}}"></script>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="page-header">
                    <h1>TODO</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-md-offset-3 col-xs-12 col-sm-12">
                    <form class="" action="" method="" id="new_task">
                        <div class="form-group">
                            <label for="title">Title:</label>
                            <input type="text" id="title" name="title" value="" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label for="desc">Description:</label>
                            <textarea name="description" id="desc" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="deadline">Deadline:</label>
                            <input type="text" id="deadline" name="deadline" value="" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <button id="creat_task" class="btn btn-primary">Create Task</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <ul id="tasks"></ul>
            </div>
        </div>
        <script type="text/javascript">
            (function($){
                $.ajax({
                    url:'/api/tasks',
                    method:'GET'
                }).done(function($data){
                    if ($data.success) {
                        initTasks($data.data);
                    }
                });

                $('#new_task').submit(function(e){
                    e.preventDefault();
                        title = $("#title").val();
                        descr = $("#desc").val();
                        deadline = $('#deadline').val();
                        $.ajax({
                            url: '/api/task',
                            method: 'POST',
                            data: {title:title,description:descr,deadline:deadline}
                        }).done(function($data){
                            if ($data.success) {
                                updateTask($data.data);
                            }
                        });
                    return false;
                })
            })($);

            function initTasks($data) {
                if ($data!=null) {
                    $.each($data, function($i,$el){
                        html = '<li id="'+$el.id+'">'+$el.name+'</li>';
                        $('#tasks').append(html);
                    });
                }
            }

            function updateTask($data){
                html = '<li id="'+$data.id+'">'+$data.name+'</li>';
                $('#tasks').append(html);
            }

            $('#deadline').datepicker({format:'yyyy-mm-dd'});
        </script>
    </body>
</html>
