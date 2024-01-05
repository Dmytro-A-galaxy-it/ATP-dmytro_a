<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Old</title>
</head>
<body>
    <p>
        Driver, {{$drivename}}, left today without a pension, bus, license plate. 
        @foreach ( $number as $num)
        {{$num->deg_namber}}
        @endforeach 
        left without a driver
    </p>
</body>
</html>