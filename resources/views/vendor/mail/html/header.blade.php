@props(['url'])
<tr>
    <td class="header">
        <a href="{{ $url }}" style="display: inline-block; text-decoration: none;">
            <table border="0" cellpadding="0" cellspacing="0" style="background-color: #8A2BE2; width: 64px; height: 64px; border-radius: 16px; box-shadow: 0 0 30px rgba(138,43,226,0.4); margin: 0 auto;">
                <tr>
                    <td align="center" valign="middle">
                        <span style="font-size: 28px; color: #ffffff; font-family: sans-serif; font-weight: bold;">K</span>
                    </td>
                </tr>
            </table>
            <div style="margin-top: 10px; color: #ffffff; font-size: 20px; font-weight: bold;">
                {{ config('app.name') }}
            </div>
        </a>
    </td>
</tr>