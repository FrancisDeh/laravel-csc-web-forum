<div class="card">
	<div class="table-responsive">
        <table class="table table-hover">
            <tbody>
                <tr>
                    <td style="text-align: left;"><i class="fa fa-book text-primary fa-2x"></i></td>
                    <td style="text-align: left;">
                        @isset ($user->programme->name)
                        {{ $user->programme->name}}
                        @else
                            Not Set
                        @endisset
                </td>
                </tr>
                <tr>
                    <td style="text-align: left;"><i class="fa fa-bars text-primary fa-2x"></i></td>
                    <td style="text-align: left;">
                        @isset ($user->level)
                            {{$user->level}}
                        @else
                            Not Set
                        @endisset
                        
                    </td>
                </tr>
                <tr>
                    <td style="text-align: left;"><i class="fa fa-transgender text-primary fa-2x"></i></td>
                    <td style="text-align: left;">
                       @isset ($user->gender)
                            {{$user->gender}}
                        @else
                            Not Set
                        @endisset
                    </td>
                </tr>
             	<tr>
                    <td style="text-align: left;"><i class="fa fa-envelope text-primary fa-2x"></i></td>
                    <td style="text-align: left;">
                         @isset ($user->email)
                            {{$user->email}}
                        @else
                            Not Set
                        @endisset
                       
                    </td>
                </tr>
                <tr>
                    <td style="text-align: left;"><i class="fa fa-whatsapp text-primary fa-2x"></i></td>
                    <td style="text-align: left;">
                         @isset ($user->whatsapp_contact)
                            {{$user->whatsapp_contact }}
                        @else
                            Not Set
                        @endisset
                     
                    </td>
                </tr>
                <tr>
                    <td style="text-align: left;"><i class="fa fa-phone-square text-primary fa-2x"></i></td>
                    <td style="text-align: left;">
                        @isset ($user->other_contact)
                            {{$user->other_contact}}
                        @else
                            Not Set
                        @endisset
                    </td>
                </tr>
                <tr>
                    <td style="text-align: left;"><i class="fa fa-facebook-square text-primary fa-2x"></i></td>
                    <td style="text-align: left;">
                         @isset ($user->facebook_handle)
                            <a href="https://{{$user->facebook_handle}}">{{$user->facebook_handle}}</a>
                        @else
                            Not Set
                        @endisset
                        
                    </td>
                </tr>
               
            </tbody>
        </table> 
        </div>  
</div>
