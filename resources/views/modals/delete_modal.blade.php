<!-- delete Modal -->
<div id="delete-modal" class="modal fade">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title h6">Delete Confirmation</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body text-center">
                <form action="{{ route('admin.category-delete') }}" method="post">
                    @csrf
                    @method('DELETE')
                    <input id="id" type="hidden" name="category_id">
                    <p class="mt-1">Are you sure to delete this?</p>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                      <button type="submit" class="btn btn-sm btn-danger">Yes, Delete Contact</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div><!-- /.modal -->