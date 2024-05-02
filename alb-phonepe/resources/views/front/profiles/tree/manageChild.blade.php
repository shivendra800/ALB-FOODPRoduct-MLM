<ul>
    @foreach($childs as $child)
       <li>
        <i class="fa fa-user"></i>

        <br>
           {{ $child->name }}
           <br>
           (<small style="color: black;"> MemberId-{{ $child->member_id }}</small>)
           <br>
           (<small style="color: red;">Referral By {{ $child->sponser_id }}</small>)
         
       @if(count($child->childs))
                @include('admin.tree.manageChild',['childs' => $child->childs])
            @endif
       </li>
    @endforeach
    </ul>
