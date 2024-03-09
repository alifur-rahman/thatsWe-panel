<form id="form-modal-success-update" class="todo-modal" onsubmit="return false"
    action="{{ route('content.success-info.update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{ $todoItem->id }}">
    <div class="modal-header align-items-center mb-1">
        <h5 class="">Edit {{ $todoItem->title_en }}</h5>
        <div class="todo-item-action d-flex align-items-center justify-content-between ms-auto">

            <i data-feather="x" class="cursor-pointer" data-bs-dismiss="modal" stroke-width="3"></i>
        </div>
    </div>
    <div class="modal-body flex-grow-1 pb-sm-0 pb-3">
        <div class="action-tags">

            <div class="mb-1 ">
                <div id="" class="al_single_input_item" role="tablist" aria-multiselectable="true">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Title</h4>
                        </div>
                        <div class="card-body">
                            <div class="accordion" id="accordionTitle">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="enTitle">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#enTitleAcc" aria-expanded="true"
                                            aria-controls="enTitleAcc">
                                            English
                                        </button>
                                    </h2>
                                    <div id="enTitleAcc" class="accordion-collapse collapse show"
                                        aria-labelledby="enTitle" data-bs-parent="#accordionTitle">
                                        <div class="accordion-body">

                                            <div class="form-floating mb-0">
                                                <textarea class="form-control char-textarea" id="textarea-title-en" rows="2" name="title_en"
                                                    placeholder="Write In English" style="height: 50px"> {{ $todoItem->title_en }} </textarea>
                                                <label for="textarea-title-en">Write
                                                    In English</label>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="deTitle">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#deTitleAcc" aria-expanded="false"
                                            aria-controls="deTitleAcc">
                                            Deutsch
                                        </button>
                                    </h2>
                                    <div id="deTitleAcc" class="accordion-collapse collapse" aria-labelledby="deTitle"
                                        data-bs-parent="#accordionTitle">
                                        <div class="accordion-body">

                                            <div class="form-floating mb-0">
                                                <textarea class="form-control char-textarea" id="textarea-title-de" rows="2" placeholder="Write In English"
                                                    name="title_de" style="height: 50px"> {{ $todoItem->title_de }}</textarea>
                                                <label for="textarea-title-de">Write
                                                    In Deutsch</label>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="frTitle">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#frTitleAcc" aria-expanded="false"
                                            aria-controls="frTitleAcc">
                                            Français
                                        </button>
                                    </h2>
                                    <div id="frTitleAcc" class="accordion-collapse collapse" aria-labelledby="frTitle"
                                        data-bs-parent="#accordionTitle">
                                        <div class="accordion-body">
                                            <div class="form-floating mb-0">
                                                <textarea class="form-control char-textarea" id="textarea-title-fr" rows="2" placeholder="Write In Français"
                                                    name="title_fr" style="height: 50px"> {{ $todoItem->title_fr }}</textarea>
                                                <label for="textarea-title-fr">Write
                                                    In Français</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="esTitle">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#esTitleAcc"
                                            aria-expanded="false" aria-controls="esTitleAcc">
                                            Español
                                        </button>
                                    </h2>
                                    <div id="esTitleAcc" class="accordion-collapse collapse"
                                        aria-labelledby="esTitle" data-bs-parent="#accordionTitle">
                                        <div class="accordion-body">
                                            <div class="form-floating mb-0">
                                                <textarea class="form-control char-textarea" id="textarea-title-sp" rows="2" name="title_sp"
                                                    placeholder="Write In Español" style="height: 50px"> {{ $todoItem->title_sp }} </textarea>
                                                <label for="textarea-title-sp">Write
                                                    In Español</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="tuTitle">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#tuTitleAcc"
                                            aria-expanded="false" aria-controls="tuTitleAcc">
                                            Türkçe
                                        </button>
                                    </h2>
                                    <div id="tuTitleAcc" class="accordion-collapse collapse"
                                        aria-labelledby="etuTitle" data-bs-parent="#accordionTitle">
                                        <div class="accordion-body">
                                            <div class="form-floating mb-0">
                                                <textarea class="form-control 
                                         char-textarea" name="title_tr"
                                                    id="textarea-title-tu" rows="2" placeholder="Write In Türkçe" style="height: 50px"> {{ $todoItem->title_tr }} </textarea>
                                                <label for="textarea-title-tu">Write
                                                    In Türkçe</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="itaTitle">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#itaTitleAcc"
                                            aria-expanded="false" aria-controls="itaTitleAcc">
                                            Italiano
                                        </button>
                                    </h2>
                                    <div id="itaTitleAcc" class="accordion-collapse collapse"
                                        aria-labelledby="itaTitle" data-bs-parent="#accordionTitle">
                                        <div class="accordion-body">
                                            <div class="form-floating mb-0">
                                                <textarea class="form-control char-textarea" name="title_it" id="textarea-title-ita" rows="2"
                                                    placeholder="Write In Italiano" style="height: 50px"> {{ $todoItem->title_it }} </textarea>
                                                <label for="textarea-title-ita">Write
                                                    In Italiano</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="porTitle">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#porTitleAcc"
                                            aria-expanded="false" aria-controls="porTitleAcc">
                                            Português
                                        </button>
                                    </h2>
                                    <div id="porTitleAcc" class="accordion-collapse collapse"
                                        aria-labelledby="porTitle" data-bs-parent="#accordionTitle">
                                        <div class="accordion-body">
                                            <div class="form-floating mb-0">
                                                <textarea class="form-control char-textarea" name="title_po" id="textarea-title-por" rows="2"
                                                    placeholder="Write In Português" style="height: 50px"> {{ $todoItem->title_po }} </textarea>
                                                <label for="textarea-title-por">Write
                                                    In Português</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="danTitle">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#danTitleAcc"
                                            aria-expanded="false" aria-controls="danTitleAcc">
                                            Dansk
                                        </button>
                                    </h2>
                                    <div id="danTitleAcc" class="accordion-collapse collapse"
                                        aria-labelledby="danTitle" data-bs-parent="#accordionTitle">
                                        <div class="accordion-body">
                                            <div class="form-floating mb-0">
                                                <textarea class="form-control char-textarea" name="title_da" id="textarea-title-dan" rows="2"
                                                    placeholder="Write In Dansk" style="height: 50px"> {{ $todoItem->title_da }} </textarea>
                                                <label for="textarea-title-dan">Write
                                                    In Dansk</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="nedTitle">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#nedTitleAcc"
                                            aria-expanded="false" aria-controls="nedTitleAcc">
                                            Nederlands
                                        </button>
                                    </h2>
                                    <div id="nedTitleAcc" class="accordion-collapse collapse"
                                        aria-labelledby="nedTitle" data-bs-parent="#accordionTitle">
                                        <div class="accordion-body">
                                            <div class="form-floating mb-0">
                                                <textarea class="form-control char-textarea" id="textarea-title-ned" rows="2" name="title_ne"
                                                    placeholder="Write In Nederlands" style="height: 50px"> {{ $todoItem->title_ne }} </textarea>
                                                <label for="textarea-title-ned">Write
                                                    In Nederlands</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="mb-1 ">
                <div id="" class="al_single_input_item" role="tablist" aria-multiselectable="true">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Description</h4>
                        </div>
                        <div class="card-body">
                            <div class="accordion" id="accordionDesc">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="enDesc">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#enDescAcc" aria-expanded="true"
                                            aria-controls="enDescAcc">
                                            English
                                        </button>
                                    </h2>
                                    <div id="enDescAcc" class="accordion-collapse collapse show"
                                        aria-labelledby="enDesc" data-bs-parent="#accordionDesc">
                                        <div class="accordion-body">

                                            <div class="form-floating mb-0">
                                                <textarea class="form-control char-textarea" id="textarea-Desc-en" rows="2" placeholder="Write In English"
                                                    name="desc_en" style="height: 50px"> {{ $todoItem->desc_en }}</textarea>
                                                <label for="textarea-Desc-en">Write
                                                    In English</label>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="deDesc">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#deDescAcc"
                                            aria-expanded="false" aria-controls="deDescAcc">
                                            Deutsch
                                        </button>
                                    </h2>
                                    <div id="deDescAcc" class="accordion-collapse collapse" aria-labelledby="deDesc"
                                        data-bs-parent="#accordionDesc">
                                        <div class="accordion-body">

                                            <div class="form-floating mb-0">
                                                <textarea class="form-control char-textarea" id="textarea-Desc-de" rows="2" placeholder="Write In English"
                                                    name="desc_de" style="height: 50px"> {{ $todoItem->desc_de }}</textarea>
                                                <label for="textarea-Desc-de">Write
                                                    In Deutsch</label>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="frDesc">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#frDescAcc"
                                            aria-expanded="false" aria-controls="frDescAcc">
                                            Français
                                        </button>
                                    </h2>
                                    <div id="frDescAcc" class="accordion-collapse collapse" aria-labelledby="frDesc"
                                        data-bs-parent="#accordionDesc">
                                        <div class="accordion-body">
                                            <div class="form-floating mb-0">
                                                <textarea class="form-control char-textarea" id="textarea-Desc-fr" rows="2" name="desc_fr"
                                                    placeholder="Write In Français" style="height: 50px"> {{ $todoItem->desc_fr }}</textarea>
                                                <label for="textarea-Desc-fr">Write
                                                    In Français</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="esDesc">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#esDescAcc"
                                            aria-expanded="false" aria-controls="esDescAcc">
                                            Español
                                        </button>
                                    </h2>
                                    <div id="esDescAcc" class="accordion-collapse collapse" aria-labelledby="esDesc"
                                        data-bs-parent="#accordionDesc">
                                        <div class="accordion-body">
                                            <div class="form-floating mb-0">
                                                <textarea class="form-control char-textarea" id="textarea-Desc-sp" rows="2" placeholder="Write In Español"
                                                    name="desc_sp" style="height: 50px"> {{ $todoItem->desc_sp }}</textarea>
                                                <label for="textarea-Desc-sp">Write
                                                    In Español</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="tuDesc">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#tuDescAcc"
                                            aria-expanded="false" aria-controls="tuDescAcc">
                                            Türkçe
                                        </button>
                                    </h2>
                                    <div id="tuDescAcc" class="accordion-collapse collapse" aria-labelledby="etuDesc"
                                        data-bs-parent="#accordionDesc">
                                        <div class="accordion-body">
                                            <div class="form-floating mb-0">
                                                <textarea class="form-control char-textarea" id="textarea-Desc-tu" name="desc_tr" rows="2"
                                                    placeholder="Write In Türkçe" style="height: 50px"> {{ $todoItem->desc_tr }}</textarea>
                                                <label for="textarea-Desc-tu">Write
                                                    In Türkçe</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="itaDesc">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#itaDescAcc"
                                            aria-expanded="false" aria-controls="itaDescAcc">
                                            Italiano
                                        </button>
                                    </h2>
                                    <div id="itaDescAcc" class="accordion-collapse collapse"
                                        aria-labelledby="itaDesc" data-bs-parent="#accordionDesc">
                                        <div class="accordion-body">
                                            <div class="form-floating mb-0">
                                                <textarea class="form-control char-textarea" id="textarea-Desc-ita" rows="2" name="desc_it"
                                                    placeholder="Write In Italiano" style="height: 50px"> {{ $todoItem->desc_it }}</textarea>
                                                <label for="textarea-Desc-ita">Write
                                                    In Italiano</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="porDesc">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#porDescAcc"
                                            aria-expanded="false" aria-controls="porDescAcc">
                                            Português
                                        </button>
                                    </h2>
                                    <div id="porDescAcc" class="accordion-collapse collapse"
                                        aria-labelledby="porDesc" data-bs-parent="#accordionDesc">
                                        <div class="accordion-body">
                                            <div class="form-floating mb-0">
                                                <textarea class="form-control char-textarea" id="textarea-Desc-por" rows="2" name="desc_po"
                                                    placeholder="Write In Português" style="height: 50px"> {{ $todoItem->desc_po }}</textarea>
                                                <label for="textarea-Desc-por">Write
                                                    In Português</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="danDesc">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#danDescAcc"
                                            aria-expanded="false" aria-controls="danDescAcc">
                                            Dansk
                                        </button>
                                    </h2>
                                    <div id="danDescAcc" class="accordion-collapse collapse"
                                        aria-labelledby="danDesc" data-bs-parent="#accordionDesc">
                                        <div class="accordion-body">
                                            <div class="form-floating mb-0">
                                                <textarea class="form-control 
                                            char-textarea" id="textarea-Desc-dan"
                                                    rows="2" placeholder="Write In Dansk" name="desc_da" style="height: 50px"> {{ $todoItem->desc_da }}</textarea>
                                                <label for="textarea-Desc-dan">Write
                                                    In Dansk</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="nedDesc">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#nedDescAcc"
                                            aria-expanded="false" aria-controls="nedDescAcc">
                                            Nederlands
                                        </button>
                                    </h2>
                                    <div id="nedDescAcc" class="accordion-collapse collapse"
                                        aria-labelledby="nedDesc" data-bs-parent="#accordionDesc">
                                        <div class="accordion-body">
                                            <div class="form-floating mb-0">
                                                <textarea class="form-control char-textarea" id="textarea-Desc-ned" rows="2" name="desc_ne"
                                                    placeholder="Write In Nederlands" style="height: 50px"> {{ $todoItem->desc_ne }}</textarea>
                                                <label for="textarea-Desc-ned">Write
                                                    In Nederlands</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="mb-1 position-relative">
                <label for="task-assigned_e" class="form-label d-block">Assignee
                    To</label>
                <select class="select2 form-select task-assigned_select" id="task-assigned_sedc" name="assign_to">
                    <option data-img="{{ asset('logo3.png') }}" value="ThatsWE"
                        @if ($todoItem->assign_to == 'ThatsWE') selected @endif>
                        ThatsWE
                    </option>
                    <option data-img="https://thatssoft.de/public/assets/img/icons/logo3.png" value="ThatsSoft"
                        @if ($todoItem->assign_to == 'ThatsSoft') selected @endif>
                        ThatsSoft
                    </option>
                </select>
            </div>

            <div class="mb-1">
                <label for="task-tagr" class="form-label d-block">Save as</label>
                <select class="form-select " id="task-tagr" name="save_as">
                    <option value="draft" @if ($todoItem->save_as == 'draft') selected @endif>Draft</option>
                    <option value="active" @if ($todoItem->save_as == 'active') selected @endif>Active</option>

                </select>
            </div>


        </div>
        <div class="my-1">
            <button type="submit" id="update-success" class="btn btn-primary add-todo-item me-1"
                onclick="_run(this)" data-el="fg" data-form="form-modal-success-update"
                data-loading="<div class='spinner-border spinner-border-sm' role='status'><span class='visually-hidden'>Loading...</span></div>"
                data-callback="updateSuccessCallBack" data-btnid="update-success">Update</button>
            <button type="button" class="btn btn-outline-secondary add-todo-item cancel_modal me-1"
                data-bs-dismiss="modal">
                Cancel
            </button>
            <button type="button" class="btn btn-outline-danger update-btn"
                data-success-delete="{{ $todoItem->id }}">
                Delete
            </button>

        </div>
    </div>
</form>
