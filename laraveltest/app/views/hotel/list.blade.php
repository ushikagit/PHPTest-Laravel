<html lang="en">
    <head>
        <meta charset="utf-8">
        {{HTML::style('packages/bootstrap/css/bootstrap.min.css') }}
        {{ HTML::script('packages/jquery/jquery-1.11.3.js') }}
        {{ HTML::script('packages/jquery/common.js') }}

        <title>Hotels</title>
    </head>

    <body>

        <!-- Fixed navbar -->
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">        
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="{{route('hotel.index')}}">Hotels</a></li>
                        <li><a href="{{route('hotel.create')}}">Create Hotel</a></li>

                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </nav>

        <div class="container-fluid" style="margin-top: 60px;">
            <div data-example-id="simple-table" class="bs-example">
                <table class="table" id="hoteldata">
                    <caption><h2>Hotels</h2></caption>  

                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon">Find</div>
                            <input type="text" class="form-control" id="searchtext" name="searchtext" placeholder="Location" style="width: 200px;">
                            <button type="button" onclick="searchData();" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span></button>
                        </div>        
                    </div>            
                    <div id="search_error" style="display: none;">Search Results cannot find.</div>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Location{{Form::select('sort',array('asc'=>'A - Z','desc'=>'Z - A'), null, array('class' => 'form-control','id'=>'sort','onchange'=>'searchSort()','style'=>'width:100px'))}}</th>
                  <!--          <th></th>
                            <th></th>-->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($list as $hotel)
                        <tr>
                            <th scope="row">{{ $hotel->id}}</th>
                            <td>{{ $hotel->name}}</td>
                            <td>{{ $hotel->address}}</td>
                            <td>{{ $hotel->location_name}}</td>
                  <!--          <td><a href="{{ route('hotel.edit',$hotel->id) }}"><span class="glyphicon glyphicon-edit"></span></a></td>
                            <td><a href="{{ route('hotel.destroy',$hotel->id) }}"><span class="glyphicon glyphicon-trash"></span></a></td>-->
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div id="dv_paginate">            
                    {{ $list->links() }}
                </div>
            </div>
        </div>
    </body>
</html>
