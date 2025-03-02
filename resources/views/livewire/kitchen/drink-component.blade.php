
<div>
    @section("title" , "Bebidas")
        <div class="container-scroller">
            <x-kitchen.modal-form-add-drink :status="$status" />
            <livewire:admin.top-bar-component />

          <div class="container-fluid page-body-wrapper">

            <x-kitchen.side-bar />

            <div class="main-panel">
              <div class="content-wrapper">

                <div class="container-fluid">

                     <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body">
                        <h5 class="card-title text-muted text-uppercase">Bebidas</h5>
                        </p>

                        <div class="col-md-12 d-flex align-items-center gap-2">
                            <button data-bs-target='#form-add-drink' data-bs-toggle='modal' class='btn btn-primary'>Adicionar</button>
                          <input type='text' wire:model.live="searcher" placeholder='Pesquisar' class='form-control' />
                          <input title='Data inicial' type='date' wire:model.live="startdate"  class='form-control' />
                          <input  title='Data final' type='date' wire:model.live="enddate" class='form-control' />
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover">
                              <thead>
                                <tr>
                                  <th>Data de registo</th>
                                  <th>Bebida</th>
                                  <th>Preço</th>
                                  <th>Foto</th>
                                  <th class="text-center">Opções</th>
                                </tr>
                              </thead>
                              <tbody>
                                @if (isset($drinks) and count($drinks) > 0)
                                @foreach ($drinks as $drink)
                                    <tr>
                                       <td>{{ $drink->created_at }}</td>
                                       <td>{{ $drink->name }}</td>
                                       <td>{{ $drink->price }}</td>
                                        <td>
                                            <img class='rounded' src="{{asset('/storage/img/'.$drink->photo)}}" />
                                        </td>

                                        <td>
                                          <div class="d-flex align-items-center justify-content-center gap-1">
                                              <button wire:click='edit({{ $drink->id }})' class=' btn btn-sm btn-info'  data-bs-target='#form-add-drink' data-bs-toggle='modal'>
                                              <i class='fa fa-solid fa-edit'></i>
                                                <span>Editar</span>
                                            </button>

                                            <button wire:click='delete({{ $drink->id }})' class='btn btn-sm btn-danger'>
                                                <span>Eliminar</span>
                                                <i class='fa fa-solid fa-trash-alt'></i>
                                            </button>
                                          </div>
                                        </td>
                                    </tr>
                                @endforeach
                                @else
                                  <tr>
                                      <td colspan="10">
                                              <div class='alert alert-warning text-center'>Nenhum resultado encontrado!</div>
                                      </td>
                                  </tr>
                                @endif

                              </tbody>
                            </table>
                        </div>
                          <div class='d-flex'>
                              <span wire:ignore class='my-3'>{{isset($drinks) ? $drinks->links('pagination::bootstrap-4') : ''}}</span>
                          </div>

                      </div>
                    </div>
                  </div>

                </div>

                <x-admin.footer />

              </div>
    </div>
