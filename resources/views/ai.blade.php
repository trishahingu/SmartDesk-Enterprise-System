<!DOCTYPE html>
<html>
<head>
    <title>SmartDesk AI Assistant</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background:#f5f7fb;
        }

        .card{
            margin-top:50px;
            border:none;
            border-radius:15px;
            box-shadow:0 5px 20px rgba(0,0,0,.1);
        }

        textarea{
            min-height:170px;
        }

        .result{
            background:#eef6ff;
            padding:20px;
            border-radius:10px;
            white-space:pre-wrap;
        }
    </style>
</head>
<body>

<div class="container">

<div class="card">

<div class="card-header bg-primary text-white">

<h3>🤖 SmartDesk AI Productivity Assistant</h3>

</div>

<div class="card-body">

<form action="/ai/generate" method="POST">

@csrf

<label class="form-label">

Enter your Prompt

</label>

<textarea
name="prompt"
class="form-control"
placeholder="Example: Generate a professional project summary for SmartDesk..."
required></textarea>

<br>

<button class="btn btn-primary">

Generate with Gemini AI

</button>

</form>

@if(session('result'))

<hr>

<h4>AI Response</h4>

<div class="result">

{{ session('result') }}

</div>

@endif

</div>

</div>

</div>

</body>
</html>