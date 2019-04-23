@extends('layouts.admin')
@section('content')
    <section class="panel">
        <header>
            <div style="width:100%;height:60px;display : flex;flex-direction: row;">
                <h3 style="font-weight:bold;margin-bottom: 0;"><i class="icon-picture"></i> افزودن بنر</h3>
            </div>
        </header>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th><i class="icon-tag"></i> نام</th>
                <th><i class="icon-picture"></i> بنر</th>
                <th><i class="icon-link"></i> لینک</th>
                <th><i class="icon-plus"></i> افزودن</th>
            </tr>
            </thead>
            <tbody>
            @foreach($baners as $baner)
                <tr>
                    <form action="{{route('baner.store',['image'=>$baner->id])}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <td>{{$baner->name}}</td>
                        <td>
                            <input type="file" name="image" id="fileUpload" style="display: none">
                            <div class="btn btn-info btn-x button" id="customButton">
                                <i class=" icon-picture">
                                </i> انتخاب بنر
                            </div>
                            <span id="fileName" style="margin: 33px 15px 0 0;color: #00abea"></span>
                        </td>
                        <td>
                            <input type="text" style="width:400px;direction: ltr;padding-left: 5px" name="link" value="{{$baner->link}}" >
                        </td>
                        <td>
                            <button style="margin-left: 8px" class="btn btn-success btn-x" type="submit">افزودن</button>
                        </td>
                    </form>
                </tr>
            @endforeach
            </tbody>
        </table>
        <script type="text/javascript">
            document.getElementById("customButton").addEventListener("click", function () {
                document.getElementById("fileUpload").click();  // trigger the click of actual file upload button
            });

            document.getElementById("fileUpload").addEventListener("change", function () {
                var fullPath = document.getElementById('fileUpload').value;
                var fileName = fullPath.split(/(\\|\/)/g).pop();  // fetch the file name
                document.getElementById("fileName").innerHTML = fileName;  // display the file name
            }, false);

        </script>
    </section>
@endsection
