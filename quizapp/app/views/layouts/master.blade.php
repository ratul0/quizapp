<html>
<head>
	<meta charset="UTF-8">
	<title>{{$title}}</title>
	{{HTML::style('/css/bootstrap.min.css')}}
	{{HTML::style('/css/bootswatch.min.css')}}
  	{{HTML::style('/css/main.css')}}
	{{HTML::script('/js/jquery.min.js')}}
	{{HTML::script('/js/bootstrap.min.js')}}
	{{HTML::script('/js/bootswatch.js')}}
  <!-- <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css" type="text/css" rel="stylesheet"> -->


</head>
<body>
	

		<div class="navbar navbar-inverse navbar-fixed-top">
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                  <!-- <a class="navbar-brand" href="#">Quiz App</a> -->
                  {{ link_to('home','Quiz App',$attributes=['class'=>'navbar-brand']) }}
                </div>
                <div class="navbar-collapse collapse navbar-inverse-collapse">
                  <ul class="nav navbar-nav">
                    
                    
                    @if(Auth::check())
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">Subject <b class="caret"></b></a>
                      <ul class="dropdown-menu">
                        <li>{{ HTML::linkRoute('subjects.index','View Subjects') }}</li>
                        <li>{{ HTML::linkRoute('subjects.create','Add Subjects') }}</li>

                      </ul>
                    </li>

                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">Topic <b class="caret"></b></a>
                      <ul class="dropdown-menu">
                        <li>{{ HTML::linkRoute('subjects.topics.index','View Topics') }}</li>
                        <li>{{ HTML::linkRoute('subjects.topics.create','Add Topics') }}</li>

                      </ul>
                    </li>

                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">Question <b class="caret"></b></a>
                      <ul class="dropdown-menu">
                        <li>{{ HTML::linkRoute('subjects.topics.questions.index','View Questions') }}</li>

                        <li>{{ HTML::linkRoute('subjects.topics.questions.create','Create Question') }}</li>
                        

                      </ul>
                    </li>
                    
                    <li>{{ HTML::linkRoute('adminchange','Admin') }}</li>
                    @endif
                    
                    
                    
                  </ul>

                  <ul class="nav navbar-nav navbar-right">
                    @if(!Auth::check())
                    
                    
                    <li>{{ HTML::linkRoute('login','Login') }}</li>
                    @else
                        
                       <li>{{ HTML::linkRoute('logout','Logout ('.Auth::user()->email.')') }}</li> 
                    @endif
                  </ul>
                </div><!-- /.nav-collapse -->
              </div><!-- end navbar -->


    <div id="container">
              <div id="content">
              	@if(Session::has('message'))
              		<p id="message">{{Session::get('message')}}</p>
              	@endif

              	@yield('content')
              </div> <!-- end content -->


              
              <footer>
                <div class="container">
                  <div class="row">
                    <div class="col-md-6 col-md-offset-3 text-center">
                      
                      <hr>
                      <p>Product of <a href="http://www.infancyit.com">Infancy WEB</a>.<br>Infancyit &copy; {{date('Y')}}</p>
                    </div>
                  </div>
                </div>
              </footer><!-- end footer -->



	</div> <!-- end container -->
	
</body>
</html>