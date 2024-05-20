<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>multiselect</title>
</head>
<body>
    <form action="/multiselect-store" method="post">
        <input type="text" name="student_id" placeholder="Student ID">
        <select name="options[]" multiple="multiple">
            @foreach ($courses as $course)
                <option value={{$course['id']}}>{{$course['course_name']}}</option>
            @endforeach
        </select>
        <input type="checkbox" name="test[]" value="test1">
        <input type="checkbox" name="test[]" value="test2">
        <input type="checkbox" name="test[]" value="test3">
        <button type="submit">Submit</button>
    </form>
    <table>
        <thead>
            <tr>
            <th>Student ID</th>
            <th>Course ID</th>
            <th>Course Name</th>
        </tr>
        </thead>
        <tbody>
        
            @foreach ($details as $detail)
            <tr>
                <td>{{$detail['student_id']}}</td>
                <td>{{$detail['selected_course_id']}}</td>
                <td>{{$courses[$detail['selected_course_id']-1]["course_name"]}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>