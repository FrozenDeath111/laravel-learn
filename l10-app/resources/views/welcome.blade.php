<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @php
        $options = array(
            'op1', 'op2', 'op3'
        );
        $selected = '';
    @endphp
    <form action="/" method="get">
    <select name="option" id="option_id" value="">
        @foreach ($options as $option)
            <option value={{$option}}>{{$option}}</option>
        @endforeach
    </select>
    <label for="checkbox">Checkbox</label>
    <input type="checkbox" name="checkbox" id="checkbox_id" value="check_box_value">
    <button type="submit">submit</button>
    </form>
    @php
        if(isset($_GET['option'])){
            echo $_GET['option'];
        };
        if(isset($_GET['checkbox'])){
            echo $_GET['checkbox'];
        };
    @endphp
    <a href="/login">Login</a>
    @php
        if (isset($value)) {
            # code...
            echo $value;
        };
        if (isset($all)) {
            # code...
            print_r($all);
        };
    @endphp
    <a href="/logout">Logout</a>
</body>
</html>