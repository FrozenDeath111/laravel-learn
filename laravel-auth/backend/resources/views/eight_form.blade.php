<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Eight Field</title>
</head>
<body>
    @php
        $partOne = true;
        $method = "GET";
        $action = "";
        if(isset($_GET['next'])) {
            $partOne = false;
            $method = "post";
            $action = "/store";
        }
    @endphp
    <form action="{{$action}}" method={{$method}}>
        @if ($partOne)
            <input type="text" name="field1" placeholder="Field 1">
            <input type="text" name="field2" placeholder="Field 2">
            <input type="text" name="field3" placeholder="Field 3">
            <input type="text" name="field4" placeholder="Field 4">
            <button name="next">Next</button>
        @else
            <input type="text" name="field1" placeholder="Field 1" hidden value={{$_GET["field1"]}}>
            <input type="text" name="field2" placeholder="Field 2" hidden value={{$_GET["field2"]}}>
            <input type="text" name="field3" placeholder="Field 3" hidden value={{$_GET["field3"]}}>
            <input type="text" name="field4" placeholder="Field 4" hidden value={{$_GET["field4"]}}>
            <input type="text" name="field5" placeholder="Field 5">
            <input type="text" name="field6" placeholder="Field 6">
            <input type="text" name="field7" placeholder="Field 7">
            <input type="text" name="field8" placeholder="Field 8">
            <button type="submit" name="submit">Submit</button>
        @endif
    </form>
</body>
</html>