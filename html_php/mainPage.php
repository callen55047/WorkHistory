<html>
<head>

<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href="style-main.css" rel="stylesheet">

</head>

<body>

  

<nav class="navbar navbar-default navbar-inverse" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Signed In!</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul  class="nav navbar-nav">
        <li ><a href="#">Home</a></li>
        <li><a href="#">Pictures</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">DataBase <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><h1 style='text-align:center'>TRU Questions & Answers</h1></li>

			 <li class="divider"></li>

            <li>
              <form id='Form-Display-Questions' >
                <div class="form-group">
                <button type='button' id="button-display" class="btn btn-primary btn-block" style="margin:auto;">Display Questions</button>
              </div>
              </form>
            </li>

			 <li class="divider"></li>
            <li>
                
    					<form id='add-questions'>
                
              
                            <div class="form-group">
                                <label for="search-terms">Add Question:</label>
                                <input type="text" class="form-control" id="inputQuestion">
                            </div>
                            <button type='button' id='Button-AddQuestion' class="btn btn-primary btn-block">Submit</button>
              </form>
			</li>
            <li class="divider"></li>

            <li>
              <div class="form-group">
              <button type='button' id='Button-DisplayALLanswers' class="btn btn-primary btn-block">Display All Answers</button>
            </div>
            </li>
            
          </ul>
        </li>
      </ul>

      <!-- search terms form submition -->
      <form id='form-search' class="navbar-form navbar-left" role="search" method="POST" action="controller-main.php">

        <input type='hidden' name='page' value='MainPage'>
        <input type='hidden' name='command' value='SearchQuestions'>

        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search" id="input-search-questions-terms">
        </div>
        <button type="button" id="searchButton" class="btn btn-default">Submit</button>
      </form>


      <ul class="nav navbar-nav navbar-right">

        <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>Account</b> <span class="caret"></span></a>
    			<ul id="login-dp" class="dropdown-menu">
    				<li>
    					 <div class="row">
    							<div class="col-md-12">
    								Connect via
    								<div class="social-buttons">
    									<a href="#" class="btn btn-fb"><i class="fa fa-facebook"></i> Facebook</a>
    									<a href="#" class="btn btn-tw"><i class="fa fa-instagram"></i> Instagram</a>
    								</div>
                                    or

                                    <!-- Form signing out -->
    								 <form class="form" id ="form-signout" role="form" method="POST" action="controller-main.php" 
                     accept-charset="UTF-8" id="login-nav">
    										<div class="form-group">

                          <!-- HIDDEN FORM COMMANDS -->
                          <input type='hidden' name='page' value='MainPage'>
                          <input type='hidden' name='command' value='SignOut'>

                         
    										<div class="social-buttons">
    											 <button type="submit" class="btn btn-primary btn-block">Sign Out</button>
    										</div>
    									
    								 </form>


    							</div>
    							<div class="bottom text-center">
    								<button class="btn btn-primary center-block" data-target='#modal-signin' data-toggle='modal'>Unsubscribe</button>
    							</div>
    					 </div>
    				</li>
    			</ul>



        </li>
      </ul>


    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<div  style="width:100%; margin:auto;">
  <div id="result-pane" >
  </div>
</div>




<!-- div box for deleting user from database -->
  <div id="modal-signin" class="modal fade">
    <div class="modal-dialog ">
      <div class="modal-content">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"> Sorry to see you go... </h4>
        </div>

        <div class="modal-body">
          <form id='DeleteUser' method='POST' action='controller-main.php'>
            <input type='hidden' name='page' value='MainPage'>
            <input type='hidden' name='command' value='DeleteUser'>
            <div class="form-group">
                <label for='username'> Comments:</label>
                <input type='textarea' class='form-control' id='comments' placeholder='give us some feed back!' required>
              </div>
              
              <button type='submit' class='btn btn-default'>Delete User</button> 
          </form>
        </div>

      </div>
    </div>
  </div>


  <div id="modal-Answers" class="modal fade">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"> Answers </h4>
        </div>

        <div class="modal-body">
          <form id='AddQuestion' >
            
            <input type='hidden' id='QuestionId_id'>
            <div class="form-group">
                <label for='username'> Answer: </label>
                <input type='text' class='form-control' id='answer' placeholder='.....' required>
              </div>
              
              <button type='button' id="Qanswer" class='btn btn-default'>Submit Answer!</button> 
          </form>
        </div>

      </div>
    </div>
  </div>


  <div id="modal-AnswerTable" class="modal fade">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"> Answers Table </h4>
        </div>

        <div class="modal-body">
          
            
            
            <div id="answer-pane" >
              <h2>Basic Table</h2>
                <p>The .table class adds basic styling (light padding and only horizontal dividers) to a table:</p>            
                <table class="table">
                  <thead>
                    <tr>
                      <th>Firstname</th>
                      <th>Lastname</th>
                      <th>Email</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>John</td>
                      <td>Doe</td>
                      <td>john@example.com</td>
                    </tr>
                    <tr>
                      <td>Mary</td>
                      <td>Moe</td>
                      <td>mary@example.com</td>
                    </tr>
                    <tr>
                      <td>July</td>
                      <td>Dooley</td>
                      <td>july@example.com</td>
                    </tr>
                  </tbody>
                </table>
            </div>
            </div>
              
              <button type='button' id="close-AnswerTable" class='btn btn-default'>Close</button> 
          
        </div>

      </div>
    </div>
  </div>


<div id="modal-AllAnswersTable" class="modal fade">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"> Master Table </h4>
        </div>

        <div class="modal-body">
          
            <div id="ALLanswer-pane" >
              <h2>Basic Table</h2>
                <p>The .table class adds basic styling (light padding and only horizontal dividers) to a table:</p>            
                <table class="table">
                  <thead>
                    <tr>
                      <th>Firstname</th>
                      <th>Lastname</th>
                      <th>Email</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>John</td>
                      <td>Doe</td>
                      <td>john@example.com</td>
                    </tr>
                    <tr>
                      <td>Mary</td>
                      <td>Moe</td>
                      <td>mary@example.com</td>
                    </tr>
                    <tr>
                      <td>July</td>
                      <td>Dooley</td>
                      <td>july@example.com</td>
                    </tr>
                  </tbody>
                </table>
            </div>
              
              <button type='button' id="close-MasterTable" class='btn btn-default'>Close</button> 
          
        </div>

      </div>
    </div>
  </div>



<!-- script for JSON table elements to be loaded -->
<script>

        //search button
        $('#searchButton').on('click', function() {

          var search_terms = $('#input-search-questions-terms').val();

          $.post('controller-main.php',
                {
                    page: "MainPage",
                    command: "Search",
                    "search-terms": search_terms
                     
                },
                // result comes back here
                function(result, status) 
                {
                    $('#result-pane').html(construct_table(result));

                });
        });
        
        //displays all answers from all users and questions
        $('#Button-DisplayALLanswers').on('click', function() {
          

          $.post('controller-main.php',
                {
                    page: "MainPage",
                    command: "displayAllAnswers"
                     
                },
                // result comes back here
                function(result, status) 
                {
                    $('#ALLanswer-pane').html(construct_AnswersTable(result));

                    $('#modal-AllAnswersTable').modal('toggle');

                });

        })

        $('#modal-AllAnswersTable').on('show', function () 
        {
          $('.modal-body',this).css({width:'auto',height:'auto', 'max-height':'100%'});
        });

        $('#close-MasterTable').on('click', function()
        {
          $('#modal-AllAnswersTable').modal('toggle');

        });

        //deleting questions
        function deleteQ(qid)
        {
          
           $.post('controller-main.php',
                {
                    page: "MainPage",
                    command: "DeleteQuestion",
                    "questionID": qid
                     
                },
                // result comes back here
                function(result, status) 
                {
                    $('#result-pane').html(construct_table(result));
                });

        }

        function deleteA(aid, qid)
        {
          
           $.post('controller-main.php',
                {
                    page: "MainPage",
                    command: "DeleteAnswer",
                    "answerID": aid, 
                    "questionID": qid
                     
                },
                // result comes back here
                function(result, status) 
                {
                    $('#answer-pane').html(construct_AnswersTable(result));
                });

        }

        //brings up answer modal window
        function answerQ(qid)
        {
          
          $('#modal-Answers').modal('toggle'); 

          $('#QuestionId_id').val(qid);

           
        }


        //submit answer to sql table
        $('#Qanswer').on('click', function() {

          var answer_terms = $('#answer').val();
          var question_id = $('#QuestionId_id').val();

          $.post('controller-main.php', 
                {
                    page: "MainPage",
                    command: "AddAnswer", 
                    "answer": answer_terms, 
                    "QuestionID": question_id
                     
                },
                // result comes back here
                function(result, status) 
                {
                  $('#modal-Answers').modal('toggle'); 
                    //$('#result-pane').html(construct_table(result));
                });
        });



        function displayAnswers(qid)
        {
          
          

           $.post('controller-main.php',
                {
                    page: "MainPage",
                    command: "displayAnswers",
                    "questionID": qid
                     
                },
                // result comes back here
                function(result, status) 
                {
                    $('#answer-pane').html(construct_AnswersTable(result));
                    $('#modal-AnswerTable').modal('toggle');
                });

        }

        //closes answers table
        $('#close-AnswerTable').on('click', function()
        {
            $('#modal-AnswerTable').modal('toggle');
        });



        //contructs answer table in modal window
        function construct_AnswersTable(data)
        {
          // Convert the JSON string to an object
            var obj = JSON.parse(data);  
            
            // table tag
            var table = '<table class="table">';
            // table caption
            var caption;
            for (caption in obj) {
                table += '<caption>' + caption + '</caption>';
                break;
            }
            // table head
            table += '<tr>';
            for (var p in obj[caption][0])
                table += '<th>' + p + '</th>';
            table += '</tr>';
            // table data
            for (var i = 0; i < obj[caption].length; i++) {


                table += '<tr>';
                for (var p in obj[caption][i])
                {
                  if(p == "Functions")
                  { 
                    table += "<td>";
                    var answerId = obj[caption][i][p];
                    var questionID = obj[caption][i]['QuestionId'];
                    
                    
                    table += " <button onclick=' deleteA("+ answerId + ", " + questionID +")' class='btn btn-danger'> Delete </button> "; 
                    table += "</td>";
                    
                  }
                  else
                    table += "<td id=''>" + obj[caption][i][p] + '</td>';
                }
                 

                table += '</tr>';
            }
            // table end tag
            table += '</table>';

            return table;
        }

        //constructs questions table in main window
        function construct_table(data)  // data: '{"caption":[{...}, ...]}'
        {
            // Convert the JSON string to an object
            var obj = JSON.parse(data);  
            
            // table tag
            var table = '<table class="table table-responsive">';
            // table caption
            var caption;
            for (caption in obj) {
                table += '<caption><h1>' + caption + '</h1></caption>';
                break;
            }
            // table head
            table += '<tr>';
            for (var p in obj[caption][0])
                table += '<th><strong>' + p + '</strong></th>';
            table += '</tr>';
            // table data
            for (var i = 0; i < obj[caption].length; i++) {


                table += '<tr>';
                for (var p in obj[caption][i])
                {
                  if(p == "Functions")
                  { 
                    table += "<td>";
                    var questionId = obj[caption][i][p];
                    
                    
                    table += " <button onclick=' deleteQ("+ questionId + ")' class='btn btn-danger'> Delete </button> "; 

                    table += "</td>";
                    table+="<td>";
                     table += " <button onclick=' answerQ("+ questionId + ")' class='btn btn-primary'> Answer </button> "; 
                    table += "</td>";
                    table+="<td>";
                     table += " <button onclick=' displayAnswers("+ questionId + ")' class='btn btn-success'> See Answers </button> "; 
                    table += "</td>";
                    
                    
                  }
              else
                    table += "<td id=''>" + obj[caption][i][p] + '</td>';
                }
                 

                table += '</tr>';
            }
            // table end tag
            table += '</table>';

            return table;
        }

        //adds question
        $('#Button-AddQuestion').on('click', function() {

          var search_terms = $('#inputQuestion').val();

          $.post('controller-main.php', 
                {
                    page: "MainPage",
                    command: "AddQuestion", 
                    "inputQuestion": search_terms
                     
                },
                // result comes back here
                function(result, status) 
                {
                    $('#result-pane').html(construct_table(result));
                });
        });

      
          // send ajax POST request
        $('#button-display').on('click', function() 
        {
             // Open/close a modal window; 
                                                           // Somehow 'button' button does not close the modal window.
            // get the search terms
            //var search_terms = $('#input-search-questions-terms').val();
            // send ajax POST request
            $.post('controller-main.php',
                {
                    page: "MainPage",
                    command: "DisplayQuestions"
                     
                },
                // result comes back here
                function(result, status) 
                {
                    $('#result-pane').html(construct_table(result));
                });
        });


    var timer = setTimeout(timeout, 1 * 10 * 5000);

    //on mouse move
    window.addEventListener('mousemove', function() {
      clearTimeout(timer);
      timer = setTimeout(timeout, 1 * 10 * 5000);
    });

    //on key press
    window.addEventListener('keydown', function() {
      clearTimeout(timer);
      timer = setTimeout(timeout, 1 * 10 * 5000);
    });

    //on exit call time out instantly
    window.addEventListener('unload' , function() {
      timeout();
    });

    //timeout function to submit the signout button
    function timeout()
    {
      document.getElementById('form-signout').submit(); //sends form
    }
          
    </script>

  </body>
</html>