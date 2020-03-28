@extends('layouts.template-visitor')

@section('tab-title')
    <title>Register</title>
@endsection
@section('menu')
    <li class="nav-item">
        <a class="nav-link" href="{{ URL('course') }}">Courses</a>
    </li>
@endsection

@section('content')
    <link rel="stylesheet" href="{{ URL('css/register.css') }}">

    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="overlay"></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="banner_content text-center">
                            <h2>Sign Up</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="register-content">
        <div id="register">
            <template>
                <div class="tab-menu">
                    <ul class="gridspan">
                        <li @click.prevent="changeType('company')" :class="{'is-active': type=='company'}">Institution</li>
                        <li @click.prevent="changeType('student')" :class="{'is-active': type=='student'}">Student</li>
                        <li @click.prevent="changeType('tutor')" :class="{'is-active': type=='tutor'}">Tutor</li>
                    </ul>
                </div>

                <div v-if="type == 'student'" class="register-box">
                    <h2 class="title">Student</h2>
                    <p class="sub-title">Build skills for today, tomorrow, and beyond. Education to future-proof your career.</p>
        
                    <div class="form">
                        <form action="{{ route('register') }}" method="POST">
                            {{ csrf_field() }}
                            <input id="input-box" type="hidden" name="type" value="student">
        
                            <input id="input-box" type="text" name="name" placeholder="Full Name">
                            <input id="input-box" type="email" name="email" placeholder="Email Address">
                            <input id="input-box" type="password" name="password" placeholder="Password">
                            <input id="input-box" type="text" name="address" placeholder="Address">
                            <input id="input-box" type="tel" name="phone" placeholder="Phone">
                            
                            <button type="submit" class="submit-button">SIGN UP</button>
                        </form>
                    </div>
                </div>
                <div v-if="type == 'company'" class="register-box">
                    <h2 class="title">Institution</h2>
                    <p class="sub-title">You can make more than one course</p>
        
                    <div class="form">
                        <form action="{{ route('register') }}" method="POST">
                            {{ csrf_field() }}
                            <input type="hidden" name="type" value="company">

                            <input type="text" name="name" placeholder="Company Name">
                            <input type="email" name="email" placeholder="Email Address">
                            <input type="password" name="password" placeholder="Password">
                            <input type="text" name="address" placeholder="Company Address">
                            <input type="tel" name="phone" placeholder="Company Phone">
                            
                            <button type="submit" class="submit-button">SIGN UP</button>
                        </form>
                    </div>
                </div>
                <div v-if="type == 'tutor'" class="register-box">
                    <h2 class="title">Tutor</h2>
                    <p class="sub-title">You can become a teacher in more than one institution</p>
        
                    <div class="form">
                        <form action="{{ route('register') }}" method="POST">
                            {{ csrf_field() }}
                            <input type="hidden" name="type" value="tutor">
        
                            <input type="text" name="name" placeholder="Full Name">
                            <input type="email" name="email" placeholder="Email Address">
                            <input type="password" name="password" placeholder="Password">
                            <input type="text" name="address" placeholder="Address">
                            <input type="tel" name="phone" placeholder="Phone">
                            <input type="text" name="description" placeholder="Explained your expertise">
                            
                            <select name="company" class="regular-select">
                                <option>Pilih Institusi</option>
                                @foreach ($company as $comp)
                                    @if ($comp->id == $comp->name)
                                        <option value="{{ $comp->id }}" selected>{{ $comp->name }}</option>
                                    @else
                                        <option value="{{ $comp->id }}">{{ $comp->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                            
                            <button type="submit" class="submit-button">SIGN UP</button>
                        </form>
                    </div>
                </div>
            </template>
        </div>
    </div>

    <script src="{{ URL('js/vue.js') }}"></script>

    <script>
        new Vue({
            el: '#register',
            data() {
                return {
                    type: 'student'
                }
            },
            methods: {
                changeType(type){
                    this.type = type
                }
            }
        });
    </script>
@endsection