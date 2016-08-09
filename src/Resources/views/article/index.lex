<!DOCTYPE HTML>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Articles</title>
</head>
<body>
    <h1>Articles</h1>
    {{ articles }}
        <p>
            <a href="/article/get/{{ id }}">{{ title }}</a> ({{ created_at }})
        </p>
    {{ /articles }}
</body>
</html>