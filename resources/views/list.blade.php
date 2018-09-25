<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Latest compiled and minified CSS -->
  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title> Ajax Todo List </title>
</head>
<body>
    <div class="container"> 
        <div class="row">
            <div class="col-lg-offset-3.col-lg-6">
                
                    <div class="panel panel-default">
                            <div class="panel-heading">Panel heading without title
                                    <a href="/" class="pull-right" ><i class="fa fa-plus" data-toggle="modal" data-target="#modal1" style="font-size:24px"> </i> </a> 
                            </div>
                            <div class="panel-body">
                              <ul class="list-group">
                                   <li class="list-group-item ourItem" data-toggle="modal" data-target="#myModal"> Lorem </li>
                                   <li class="list-group-item ourItem" data-toggle="modal" data-target="#myModal"> Ipsem </li>
                                   <li class="list-group-item ourItem" data-toggle="modal" data-target="#myModal"> Simple </li>
                                   <li class="list-group-item ourItem" data-toggle="modal" data-target="#myModal"> Dom </li>
                              </ul>
                            </div>
                          </div>
                           <!-- Modal -->
            </div>
            
            
        </div>
                <!-- Modal -->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="title" class="title"> Add New Item </h4>
                            </div>
                            <div class="modal-body">
                            <input type="text" name="addItem" id="addItem">
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal" id="delete" >Delete</button>
                            <button type="button" class="btn btn-primary" id="save" >Save changes</button>
                            <button type="button" class="btn btn-primary" id="addButton" >Add Item</button>
                            </div>
                        </div>
                        </div>
                    </div>
        <!-- Button trigger modal -->
        <button type="button" id="addNew" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">
        Create New
      </button>
      
    </div>




    <script
    src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>
    <script>

        $(document).ready(function(){

                $('.ourItem').each(function(){

                            $(this).click(function(event){

                                    
                                    var text = $(this).text();   
                                    $('h4.title').text("Edit Item"); 
                                    $('#addItem').val(text);
                                    $('#addButton').hide('400');
                                    $('#delete').show('400');
                                    $('#save').show('400');
                                    console.log(text);


                            });
                })

                $('#addNew').click(function(event){

  
                                    $('h4.title').text("Add New Item"); 
                                    $('#addButton').show('400');
                                    $('#delete').hide('400');
                                    $('#save').hide('400');
                                   


                })
                $.ajaxSetup({
                                headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                        });

                $('#addButton').click(function(event){

                        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');        
                        var text = $('#addItem').val();
                        
                        console.log(text); 
                       

                        $.ajax({
                                url : '{{ URL::route('list')}}',
                                type : 'post',
                                data : { "text": text },
                                dataType : 'html',
                                success : function() {
                                        console.log('done');
                                        }
                                });

                        // $.post('/list',{'text':text},function(data){
 
                        //         console.log(data);
                             

                        // });

                })

                

                
        })

        </script>
    
</body>
</html>