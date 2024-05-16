<!-- Button trigger modal -->
<button id="update_building" type="button" class="btn btn-primary d-none" data-bs-toggle="modal" data-bs-target="#2update_building_modal">
    submit circuit
</button>

<!-- Modal -->
<div class="modal fade" id="2update_building_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="2update_building_modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="2update_building_modalLabel">are you sure about that</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('circuit.update_building') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
