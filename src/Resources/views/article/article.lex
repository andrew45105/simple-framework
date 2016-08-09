<!DOCTYPE HTML>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>
	    {{ if error }}
            Error
        {{ else }}
            {{ article.title }}
        {{ endif }}
	</title>
</head>
<body>
    {{ if error }}
        <h1> Error </h1>
        <p>
            {{ error }}
        </p>
    {{ else }}
        <h1> {{ article.title }} </h1>
        <p>
            created at: {{ article.created_at }}
        </p>
        <div>
            {{ article.text }}
        </div>
    {{ endif }}
</body>
</html>