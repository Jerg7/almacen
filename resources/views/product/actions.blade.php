{{-- Modal edit --}}
<div class="modal fade" id="edit{{$product->id_product}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            
            <div class="modal-header">
                <h1 class="titulo modal-title fs-5" id="staticBackdropLabel">Editar Producto</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="{{route('products.update', $product->id_product)}}" method="POST">

                @csrf
                @method('PUT')

                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="descripcion" class="form-label" style="text-aling: left;">Categoría:</label>
                            <select name="categoria" id="" class="form-control">
                                @foreach ($categories as $category)
                                    @if ($category->id_category === $product->id_category)
                                        <option value="{{$category->id_category}}" selected>{{$category->description}}</option>  
                                    @else  
                                        <option value="{{$category->id_category}}">{{$category->description}}</option>    
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <label for="descripcion" class="form-label" style="text-aling: left;">Nombre de producto:</label>
                            <input type="text" class="form-control" name="descripcion" id="descripcion" aria-describedby="helpId" placeholder="" value="{{$product->description}}"/>
                        </div>
                        <div class="col">
                            <label for="cantidad" class="form-label" style="text-aling: left;">Cantidad:</label>
                            <input type="text" class="form-control" name="cantidad" id="cantidad" aria-describedby="helpId" placeholder="" value="{{$product->amount}}"/>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-success">Actualizar</button>
                </div>

            </form>

        </div>
    </div>
</div>


{{-- Modal delete --}}
<div class="modal fade" id="delete{{$product->id_product}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h1 class="titulo modal-title fs-5" id="staticBackdropLabel">Eliminar producto.</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="{{route('products.destroy', $product->id_product)}}" method="POST">

                @csrf
                @method('DELETE')

                <div class="modal-body">
                    ¿Está seguro de que desea eliminar la producto <strong><em>{{$product->descripcion}}</em></strong>?
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-success">Confirmar</button>
                </div>

            </form>

        </div>
    </div>
</div>