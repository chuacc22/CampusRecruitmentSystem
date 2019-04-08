@foreach ($inboxContents as $value)
    <div class="ui raised text container">
        <table class = "ui very basic table">
            <tbody>
                <tr>
                    @if($value->roleSent == 2)
                        <td style="width:50%"></td>
                        <td style="width:50%" class = "right aligned">
                            <div class="ui grey segment text-content" style="border-radius: 25px">
                                <p class="msgText">{{$value->letterDesc}}</p>
                                @if($value->pdfFile != null)
                                    <div class = "field">
                                        <a href="/download/downloadFile{{$value->pdfFile}}">Files</a>
                                    </div>
                                @endif
                            </div>
                        </td>
                    @else
                        <td style="width:50%" class = "left aligned">
                            <div class="ui teal inverted segment text-content" style="border-radius: 25px">
                                <p class="msgText">{{$value->letterDesc}}</p>
                                @if($value->pdfFile != null)
                                    <div class = "field">
                                        <a href="/download/downloadFile{{$value->pdfFile}}">Files</a>
                                    </div>
                                @endif
                            </div>
                        </td>                        
                        <td style="width:50%"></td>
                    @endif
                </tr>
            </tbody>
        </table>
    </div>
@endforeach