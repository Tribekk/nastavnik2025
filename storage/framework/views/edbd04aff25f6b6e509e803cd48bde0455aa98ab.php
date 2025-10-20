<?php if($paginator->hasPages()): ?>
    <nav role="navigation" class="flex justify-between">
        <?php if($paginator->onFirstPage()): ?>
            <button rel="prev" disabled class="btn btn-info btn-lg m-2">
                Назад
            </button>
        <?php else: ?>
            <button wire:click="previousPage" rel="prev" class="btn btn-info btn-lg m-2">
                Назад
            </button>
        <?php endif; ?>


            <?php if($paginator->hasMorePages()): ?>
                <button wire:click="nextPage" rel="next" class="btn btn-info btn-lg m-2">
                    Далее
                </button>
            <?php else: ?>
                <button rel="next" disabled class="btn btn-info btn-lg m-2">
                    Далее
                </button>
            <?php endif; ?>
    </nav>
<?php endif; ?>
<?php /**PATH D:\openserver\OpenServer\domains\prof\www\resources\views/quiz/_quiz-pagination.blade.php ENDPATH**/ ?>