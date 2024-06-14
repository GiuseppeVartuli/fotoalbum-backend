<!-- Modal trigger button -->
<button
    type="button"
    class="btn btn-danger"
    data-bs-toggle="modal"
    data-bs-target="#modal-{{$photo->id}}"
>
    Delete
</button>

<!-- Modal Body -->
<!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
<div
    class="modal fade"
    id="modal-{{$photo->id}}"
    tabindex="-1"
    data-bs-backdrop="static"
    data-bs-keyboard="false"
    
    role="dialog"
    aria-labelledby="modalTitle-{{$photo->id}}"
    aria-hidden="true"
>
    <div
        class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
        role="document"
    >
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle-{{$photo->id}}">
                    Deleting Photo
                </h5>
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                ></button>
            </div>
            <div class="modal-body text-dark">Once confirmed, your photo will be deleted and no longer retrieved... do you confirm?</div>
            <div class="modal-footer">
                <button
                    type="button"
                    class="btn btn-secondary"
                    data-bs-dismiss="modal"
                >
                    Close
                </button>
                <form action="{{route('admin.photos.destroy', $photo)}}" method="post">
                    @csrf
                    @method('DELETE')

                    <button
                        type="submit"
                        class="btn btn-danger"
                    >
                        Confirm
                    </button>
                    
                </form>
            </div>
        </div>
    </div>
</div>


