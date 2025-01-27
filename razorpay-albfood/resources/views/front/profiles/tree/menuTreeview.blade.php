@extends('index')

@section('content')
<style>
      body {
    font-family: Calibri, Segoe, "Segoe UI", "Gill Sans", "Gill Sans MT", sans-serif;
  }

  /* It's supposed to look like a tree diagram */

  .tree, .tree ul, .tree li {
      list-style: none;
      margin: 0;
      padding: 0;
      position: relative;
  }


  .tree {
      margin: 0 0 10em;
      text-align: center;
      border: 10px solid #ccc;
    padding: 10px;
    display: inline-grid;
    border-radius: 5px;
    text-decoration-line: none;
    border-radius: 5px;
    transition: .5s;
  }
  .tree, .tree ul {
      display: table;
  }
  .tree ul {
    width: 100%;
  }
      .tree li {
          display: table-cell;
          padding: 1.5em 0;
          vertical-align: top;
      }
          /* _________ */
          .tree li:before {
              outline: solid 1px #666;
              content: "";
              left: 0;
              position: absolute;
              right: 0;
              top: 10;
          }
          .tree li:first-child:before {left: 50%;}
          .tree li:last-child:before {right: 50%;}

          .tree code, .tree span {
              border: solid .1em #666;
              border-radius: .2em;
              display: inline-block;
              margin: 0 .2em .5em;
              padding: .2em .5em;
              position: relative;
          }
          /* If the tree represents DOM structure */
          .tree code {
              font-family: monaco, Consolas, 'Lucida Console', monospace;
          }

              /* | */
              .tree ul:before,
              .tree code:before,
              .tree span:before {
                  outline: solid 1px #666;
                  content: "";
                  height: .5em;
                  left: 50%;
                  position: absolute;
              }
              .tree ul:before {
                  top: -.5em;
              }
              .tree code:before,
              .tree span:before {
                  top: -.55em;
              }

  /* The root node doesn't connect upwards */
  .tree > li {margin-top: 0;}
      .tree > li:before,
      .tree > li:after,
      .tree > li > code:before,
      .tree > li > span:before {
        outline: none;
      }



</style>


<div class="col-md-12">
    <h5 class="text-center mb-4 bg-info text-white">Customer List</h5>
    <div class="tree" id="chart-container">
     <ul id="tree" >
        @foreach($admins as $tree)
           <li>
            <img style="width:40px;" src="{{ asset('public/front/dummy.png') }}" alt="Image here"class="cate-image">
            <br>
            {{ $tree->name }}
            <br>
            (<small style="color: black;"> MemberId-{{ $tree->member_id }}</small>)
            <br>
            (<small style="color: red;">Referral By {{ $tree->sponser_id }}</small>)
          
            @if(count($tree->childs))
                  @include('front.profiles.tree.manageChild',['childs' => $tree->childs])
            @endif
           </li>
        @endforeach
       </ul>
 </div>
</div>



@endsection



