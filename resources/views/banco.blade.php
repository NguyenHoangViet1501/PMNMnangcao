<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Đây là bàn cờ <h1>
    <table border="1" cellspacing="0" cellpadding="10">
        @for ($i = 0; $i < $n; $i++)
            <tr>
                @for ($j = 0; $j < $n; $j++)
                    @if ( ($i + $j) % 2 == 0 )
                        <td style="background-color: white; width: 50px; height: 50px;"></td>
                    @else
                        <td style="background-color: black; width: 50px; height: 50px;"></td>
                    @endif
                @endfor
            </tr>
        @endfor
    
    </table>
</body>
</html>