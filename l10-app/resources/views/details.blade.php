<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Details</title>
</head>
<body>
    <h1>Select Course for Student</h1>
    <form action="/detail-post" method="post">
        <input type="text" name="student_id" placeholder="Student ID">
        <select name="selected_course_id">
            @foreach ($courses as $course)
                <option value={{$course['id']}}>{{$course['course_name']}}</option>
            @endforeach
        </select>
        <button type="submit">Submit</button>
    </form>
    <h1>Course Table</h1>
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
    <h1>Teachers Table</h1>
    <table>
        <thead>
            <tr>
                <th>Teacher ID</th>
                <th>Teacher Name</th>
                <th>Course Name</th>
                <th>Student Count</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($teachers as $teacher)
                <tr>
                    <td>{{$teacher['id']}}</td>
                    <td>{{$teacher['name']}}</td>
                    <td>{{$courses[$teacher['course_id']-1]['course_name']}}</td>
                    <td>{{$teacher['student_count']}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>