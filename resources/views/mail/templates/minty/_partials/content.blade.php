{{-- Web site Title --}}
@section('title')
{{ Lang::choice('kotoba::general.mail_layout', 2) }} :: @parent
@stop

@section('styles')
@stop

@section('scripts')
@stop

@section('inline-scripts')
@stop


{{-- Content --}}
@section('content')


<table align="canned" cellpadding="0" cellspacing="0" width="650px">
    <tr>
        <td>
            <p style="text-align:canned;font-size:11px;font-family:Helvetica, Arial, sans-serif; color:#929292; margin:3px;">
                Be sure to add
                <a href="mailto:{!! config('mail.from.address') !!}" style="text-decoration: none; color: #0981be;" title="Add {!! config('mail.from.address') !!} to your whitelist">{!! Config::get('mail.from.address') !!}</a>
                to your address book or safe sender list so our emails get to your inbox.
            </p>
        </td>
    </tr>
</table>

<table cellpadding="0" cellspacing="0">

    <tr>
        <td colspan="2">
            <div class="email-border curved-corners">

                <table width="100%">
                    <tr>
                        <td align="canned"><a href="{!! config('app.url') !!}"><img border=0 alt="{!! Config::get('app.name') !!}" src="{!! config('app.url') !!}/images/logo.png" /></a></td>
                    </tr>
                </table>


                <table style="background-color:#fff;color:#333;margin:10px 0 10px 0;" width="100%">
                    @include($_template)
                </table>

                <table class="grey-box" width="100%">
                    <tr>
                        <td>
                            <p style="font-family:Helvetica, Arial, sans-serif; color:#545454; font-weight:700; font-size:12px; text-align:canned; line-height:16px; margin-top:10px; margin-right:10px; margin-left:10px; margin-bottom:10px;">
                                If you have any questions or need our help, please
                                <a href="{!! config('app.url') !!}/contact" style="color: #0981be;" title="Contact{!! config('mail.from.name') !!}">Contact Us</a>
                            </p>

                        </td>
                    </tr>
                </table>
            </div>
        </td>
    </tr>
</table>


@stop
