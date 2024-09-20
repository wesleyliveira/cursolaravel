<!-- Modal Structure -->
<div id="create" class="modal">
  <div class="modal-content">
      <h4><i class="material-icons">playlist_add_circle</i> Novo produto</h4>
      
      <form action="{{ route('admin.produto.store') }}" method="POST" enctype="multipart/form-data" class="col s12">
        @csrf
        <input type="hidden" name="id_user" value="{{auth()->user()->id}}">
          <div class="row">
              <!-- Campo Nome -->
              <div class="input-field col s6">
                  <input name="nome" id="nome" type="text" class="validate">
                  <label for="nome">Nome</label>
              </div>

              <!-- Campo Preço -->
              <div class="input-field col s6">
                  <input name="preco" id="preco" type="number" class="validate" step="0.01" min="0">
                  <label for="preco">Preço</label>
              </div>

              <!-- Campo Descrição -->
              <div class="input-field col s12">
                  <input name="descricao" id="descricao" type="text" class="validate">
                  <label for="descricao">Descrição</label>
              </div>

              <!-- Campo Categoria -->
              <div class="input-field col s12">
                  <select name="id_categoria">
                      <option value="" disabled selected>Escolha uma opção</option>
                      @foreach ($produtos as $produto)
                          <option value="{{ $produto->categoria->id }}">{{ $produto->categoria->nome }}</option>
                      @endforeach
                  </select>
                  <label>Categoria</label>
              </div>

              <!-- Campo Imagem -->
              <div class="file-field input-field col s12">
                  <div class="btn">
                      <span>Imagem</span>
                      <input name="imagem" type="file">
                  </div>
                  <div class="file-path-wrapper">
                      <input class="file-path validate" type="text">
                  </div>
              </div>
          </div>

          <!-- Botões -->
          <div class="modal-footer">
              <a href="#!" class="modal-close waves-effect waves-green btn blue right">Cancelar</a>
              <button type="submit" class="waves-effect waves-green btn green right" style="margin-right: 10px;">Cadastrar</button>
          </div>
      </form>
  </div>
</div>
