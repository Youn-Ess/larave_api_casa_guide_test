<!-- Button trigger modal -->
<button id="submit" type="button" class="btn btn-primary d-none" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
    submit circuit
</button>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('circuit.buildign_post') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="text" class="d-none" id="circuit_id" name="circuit_id">
                    <input type="text" class="d-none" id="building_latitude" name="latitude">
                    <input type="text" class="d-none" id="building_longitude" name="longitude">
                    <div class="mb-5">
                        <div>
                            <label for="name" class=" block text-base font-medium text-[#07074D]">
                                name of building
                            </label>
                            <input name="name" type="text" placeholder="name"
                                class="w-full rounded-md border border-[#e0e0e0] bg-white py-2 px-3 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>
                        <div>
                            <label for="name" class=" block text-base font-medium text-[#07074D]">
                                description
                            </label>
                            <input name="description" type="text" placeholder="description"
                                class="w-full rounded-md border border-[#e0e0e0] bg-white py-2 px-3 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>
                        <div>
                            <label for="name" class=" block text-base font-medium text-[#07074D]">
                                images
                            </label>
                            <input name="image" type="file" placeholder="description" multiple
                                class="w-full rounded-md border border-[#e0e0e0] bg-white py-2 px-3 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>
                        <div>
                            <label for="name" class=" block text-base font-medium text-[#07074D]">
                                audio
                            </label>
                            <input name="audio" type="text" placeholder="audio"
                                class="w-full rounded-md border border-[#e0e0e0] bg-white py-2 px-3 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
