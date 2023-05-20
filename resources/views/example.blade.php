<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table style="border: 2px solid black">
        <thead>
            <tr>
                <th style="border: 2px solid black">Company No.</th>
                <th style="border: 2px solid black">Company Name</th>
                <th colspan="{{count($courses)}}" style="border: 2px solid black">Eligible Courses</th>
            </tr>
            <tbody>
                @foreach ($companies as $company)

                <tr>
                    <td style="border: 2px solid black">{{$company->c_no}}</td>
                    <td style="border: 2px solid black">{{$company->name_of_company}}</td>
                    @foreach ($company->courses as $course)

                    <td>{{$course->course_name}},</td>
                    @endforeach

                </tr>
                @endforeach
            </tbody>
        </thead>
    </table>
</body>
</html>
