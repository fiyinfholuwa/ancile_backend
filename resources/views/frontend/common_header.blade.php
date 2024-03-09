
<style>
    *{
        .badge{
            color:white;
            font-size: 14px;
        }
    }
</style>

<li class="nav-item"><a href="{{route('courses')}}" class="nav-link">Programs & Courses</a></li>

<li class="nav-item country"><a href="" class="nav-linked nav-link">Study Destination</a></li>
<div class="menu-cardd">
    @php
        $firstFour = collect($destinations)->take(4);
        $nextFour = collect($destinations)->skip(4)->take(4);
    @endphp

@if(count($firstFour) > 0)
        @foreach($firstFour as $destination)
    <div>
        <h2 class="carrd-head">Study in {{optional($destination->country_info)->name}} <img height="30px" width="30px" src="{{asset(optional($destination->country_info)->flag)}}"/></h2>
        <ul class="carrd">
            <li class="sublink"><a href="{{route('destination.detail', optional($destination->country_info)->name)}}">UG in {{optional($destination->country_info)->name}}</a>
            </li>
            <li class="sublink"><a href="{{route('destination.detail', optional($destination->country_info)->name)}}">MS in {{optional($destination->country_info)->name}}</a>
            </li>
            <li class="sublink"><a href="{{route('destination.detail', optional($destination->country_info)->name)}}">MBA in {{optional($destination->country_info)->name}}</a>
            </li>
            <li class="sublink"><a href="{{route('destination.detail', optional($destination->country_info)->name)}}">Phd in {{optional($destination->country_info)->name}}</a>
            </li>
            <!-- <li class="sublink"><a href="{{route('destination.detail', optional($destination->country_info)->name)}}">Cost of Studying in {{optional($destination->country_info)->name}}</a>
            </li>
            <li class="sublink"><a href="{{route('destination.detail', optional($destination->country_info)->name)}}"> Intakes to Study in {{optional($destination->country_info)->name}}</a>
            </li>
            <li class="sublink"><a href="{{route('destination.detail', optional($destination->country_info)->name)}}">Job Opportunity in {{optional($destination->country_info)->name}}</a>
            </li> -->
        </ul>
    </div>
        @endforeach
    @endif

    @if(count($nextFour)> 0)
        <div>
            <h2 class="carrd-head">Other Top Destinations</h2>
            <ul class="carrd">

                @foreach($nextFour as $destination)
                <li class="sublink"><a href="{{route('destination.detail', optional($destination->country_info)->name)}}">Study in {{optional($destination->country_info)->name}}</a>
                </li>
                @endforeach
            </ul>
        </div>

    @endif

</div>

<li class="nav-item"><a href="{{route('resources')}}" class="nav-link">Resources</a></li>
<li class="nav-item"><a href="{{route('blog')}}" class="nav-link">Blogs</a></li>
<li class="nav-item"><a href="{{route('news')}}" class="nav-link">News</a></li>
<li class="nav-item"><a href="{{route('faq')}}" class="nav-link">FAQ</a></li>
<li class="nav-item"><a href="{{route('study.loan')}}" class="nav-link">Study Loan</a></li>
{{--            <li class="nav-item"><a href="about.html#offer" class="nav-link">Services</a></li>--}}
<li class="nav-item"><a href="{{route('about')}}" class="nav-link">About</a></li>

