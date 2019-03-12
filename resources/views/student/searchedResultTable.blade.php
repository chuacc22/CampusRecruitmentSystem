<?php $number =1;?>
    @foreach ($job as $value)
        <div class="ui container segment">
            <table class = "ui very basic table">
                <tbody>
                    <tr>
                        <td><h2><u>{{$value -> companyName}}</u></h2>
                            <br><i class="map marker icon"></i>{{$value -> location}}</td>
                        <td class= "right aligned"><img style="height: 100px; width:160px" src = "{{URL::asset('/images/ChaintopeLogo.png')}}"> </td>
                    </tr>
                    <tr>
                        <td colspan = "2">
                            {{$value -> companyOverview}}
                        <td>
                    </tr>
                    <tr>
                        <td>We're looking for:
                            <b><pre style="font-family: helvetica;">{{$value -> lookingFor}}</pre></b>
                        </td>
                        <td><b>Contact Us</b>
                            <br>{{$value -> contactUs}}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    <?php $number++;?>
@endforeach