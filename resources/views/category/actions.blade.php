{{-- Modal edit --}}
<div class="modal fade" id="edit{{$category->id_category}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Editar Categoría</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div id="transparencia" style="display:none"></div>

            {{-- <form action="{{route('categories.update', $category->id_category)}}" method="POST"> --}}
            <form id="FormEditCategory_{{$category->id_category}}">

                @csrf
                @method('PUT')

                <div class="modal-body">
                    <div class="row g-6">
                        <div class="col-auto">
                            <label for="descripcion" class="form-label">Nombre de categoría</label>
                        </div>
                        <div class="col-auto">
                            <input type="text" class="form-control" name="descripcion" id="descripcion" aria-describedby="helpId" value="{{$category->description}}"/>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div id="estatusEdit{{$category->id_category}}"></div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                    {{-- <button type="submit" class="btn btn-success">Actualizar</button> --}}
                    <button type="submit" class="btn btn-success" onclick="categoryEdit({{$category->id_category}})">Actualizar</button>
                </div>

            </form>

        </div>
    </div>
</div>


{{-- Modal delete --}}
<div class="modal fade" id="delete{{$category->id_category}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Editar Categoría</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div id="transparencia" style="display:none"></div>

            {{-- <form action="{{route('categories.destroy', $category->id_category)}}" method="POST"> --}}
            <form id="FormDeleteCategory_{{$category->id_category}}">
                
                @csrf
                @method('DELETE')
                
                <div class="modal-body">
                    ¿Está seguro de que desea eliminar la categoria <strong><em>{{$category->description}}</em></strong>?
                </div>

                <div class="form-group">
                    <div id="estatusDelete{{$category->id_category}}"></div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                    {{-- <button type="submit" class="btn btn-success">Confirmar</button> --}}
                    <button type="submit" class="btn btn-success" onclick="categoryDelete({{$category->id_category}})">Confirmar</button>
                </div>

            </form>

        </div>
    </div>
</div>