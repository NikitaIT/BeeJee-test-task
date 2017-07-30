# Тест по программированию:

Создать приложение-задачник.

Задачи состоят из:
- имени пользователя;
- е-mail;
- текста задачи;
- картинки;

Стартовая страница - список задач с возможностью сортировки по имени пользователя, email и статусу. Вывод задач нужно сделать страницами по 3 штуки (с пагинацией). Видеть список задач и создавать новые может любой посетитель без регистрации. 

Перед сохранением новой задачи можно нажать "Предварительный просмотр", он должен работать без перезагрузки страницы.
К задаче можно прикрепить картинку. Требования к изображениям - формат JPG/GIF/PNG, не более 320х240 пикселей. При попытке загрузить изображение большего размера, картинка должна быть пропорционально уменьшена до заданных размеров.

Сделайте вход для администратора (логин "admin", пароль "123"). Администратор имеет возможность редактировать текст задачи и поставить галочку о выполнении. Выполненные задачи в общем списке выводятся с соответствующей отметкой.

Фреймворки использовать нельзя. В приложении нужно с помощью чистого PHP реализовать модель MVC. Верстка на bootstrap. К дизайну особых требований нет, должно выглядеть аккуратно.

Результат нужно развернуть на любом бесплатном хостинге, (как пример - zzz.com.ua) чтобы можно было посмотреть его в действии. На github.com или bitbucket.org выкладывать не обязательно.
Для того, чтобы мы могли проверить код, пожалуйста, скопируйте в корневую папку проекта наш онлайн-редактор dayside (https://github.com/boomyjee/dayside). Таким образом редактор будет доступен по url <ваш проект>/dayside/index.php. Нужно дать PHP доступ на исполнение и запись к папке dayside. Попробуйте открыть dayside сами - вы должны увидеть код своего приложения. При первом запуске редактор попросит установить пароль: пожалуйста, поставьте как в админке "123".


Обратите внимание, аккуратность - это один из главных критериев оценки тестового.

Задание рассчитано на один рабочий день. Если выйдет чуть дольше, но толково - тоже хорошо. Будем ждать от вас сообщение с результатом работы, как справитесь. Укажите, пожалуйста, в своём письме количество потраченного времени на работу с тестовым заданием. 

В случае, если наше тестовое задание для вас оказалось слишком сложным (или вы не смогли выполнить его по другим причинам) пожалуйста, сообщите нам. Будем ждать вашего ответа в любом случае.

По окончанию выполнения ждем от вас две ссылки - на редактор dayside и на тестовое задание. Тест на интеллект не показывает результат, он виден нам во внутренней CRM. Если интересно, результат могу сообщить.

<p>Author: <a href="http://webdesign-master.ru" target="_blank">WebDesign Master</a> | <a href="http://webdesign-master.ru/blog/tools/2016-08-19-optimizedhtml.html" target="_blank">Manual in Russian</a></p>

<p>OptimizedHTML is all-inclusive, optimized for Google PageSpeed start HTML5 template with Bootstrap (grid only), Gulp, Sass, Browsersync, Autoprefixer, Clean-CSS, Uglify, Imagemin, Vinyl-FTP and Bower (libs path) support. The template contains a <strong>.htaccess</strong> file with caching rules for web server.</p>

<p>OptimizedHTML Start Template uses the best practices of web development and optimized for Google PageSpeed.</p>

<p>Cross-browser compatibility: IE9+.</p>

<p>The template uses a Sass with <strong>Sass</strong> syntax and project structure with source code in the directory <strong>app/</strong> and production folder <strong>dist/</strong>, that contains ready project with optimized HTML, CSS, JS and images.</p>

<h2>How to use OptimizedHTML</h2>

<ol>
	<li><a href="https://github.com/agragregra/optimizedhtml-start-template/archive/master.zip">Download</a> <strong>optimizedhtml-start-template</strong> from GitHub;</li>
	<li>Install Node Modules: <strong>npm i</strong>;</li>
	<li>Run the template: <strong>gulp</strong>.</li>
</ol>

<h2>Gulp tasks:</h2>

<ul>
	<li><strong>gulp</strong>: run default gulp task (sass, js, watch, browserSync) for web development;</li>
	<li><strong>build</strong>: build project to <strong>dist</strong> folder (cleanup, image optimize, removing unnecessary files);</li>
	<li><strong>deploy</strong>: project deployment on the server from <strong>dist</strong> folder via <strong>FTP</strong>;</li>
	<li><strong>rsync</strong>: project deployment on the server from <strong>dist</strong> folder via <strong>RSYNC</strong>;</li>
	<li><strong>clearcache</strong>: clear all gulp cache.</li>
</ul>

<h2>Rules for working with the starting HTML template</h2>

<ol>
	<li>All HTML files should have similar initial content as in <strong>app/index.html</strong>;</li>
	<li><strong>Template Basic Images Start</strong> comment in app/index.html - all your custom template basic images (og:image for social networking, favicons for a variety of devices);</li>
	<li><strong>Custom Browsers Color Start</strong> comment in app/index.html: set the color of the browser head on a variety of devices;</li>
	<li><strong>Custom HTML</strong> comment in app/index.html - all your custom HTML;</li>
	<li>For installing new jQuery library, just run the command "<strong>bower i plugin-name</strong>" in the terminal. Libraries are automatically placed in the folder <strong>app/libs</strong>. Bower must be installed in the system (npm i -g bower). Then place all jQuery libraries paths in the <strong>'libs'</strong> task (gulpfile.js);</li>
	<li>All custom JS located in <strong>app/js/common.js</strong>;</li>
	<li>All Sass vars placed in <strong>app/sass/_vars.sass</strong>;</li>
	<li>All Bootstrap media queries placed in <strong>app/sass/_media.sass</strong>;</li>
	<li>All jQuery libraries CSS styles placed in <strong>app/sass/_libs.sass</strong>;</li>
	<li>Rename <strong>ht.access</strong> to <strong>.htaccess</strong> before place it in your web server. This file contain rules for files caching on web server.</li>
</ol>
