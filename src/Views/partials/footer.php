<footer class="footer">
    <span class="todo-count"><?= count(array_filter($todos, function($todo) { return $todo['completed'] === "false"; })) ?> item<?= "".count($todos) !== 1 ? "s" : "" ?> left</span>

    <form class="view" method="POST" action="/todos/clear-completed/">
        <button class="clear-completed">Clear completed</button>
    </form>

</footer>

</main>

<footer class="site-footer">
    <div class="small-container">
        <p class="text-center">Made by <a href="#">Jennifer Söderberg</a></p>
    </div>

    <a href="/ ">All</a>
    <a href="/todos/filter-not-completed">Active</a>
    <a href="/todos/filter-completed">Completed</a>
</footer>

<script type="module" src="<?= $this->getScript('scripts'); ?>"></script>

</body>

</html>



