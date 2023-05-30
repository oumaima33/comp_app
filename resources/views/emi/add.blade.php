<x-app-layout> 
    <h5 class="modal-title">Add New Evaluator</h5>

            <form id="add-evaluator-form" method="POST" action="{{route('judges.store',$id_comp)}}">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}">
                        <span class="invalid-feedback">
                            <strong id="evaluator-name-error"></strong>
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="categorie">Categorie</label>
                        <input type="text" name="categorie" class="form-control" id="categorie" value="{{ old('categorie') }}">
                        <span class="invalid-feedback">
                            <strong id="evaluator-categorie-error"></strong>
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" id="email" value="{{ old('email') }}">
                        <span class="invalid-feedback">
                            <strong id="evaluator-email-error"></strong>
                        </span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button name="add" class="btn btn-success" id="add" type="submit">Add</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>