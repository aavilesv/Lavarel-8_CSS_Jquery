       <div class="form-group">
                                        <label for="cbxDivision">División</label>
                                        <select class="form-control form-control-sm select2" style="width: 100%;" formControlName="cbxDivision">
                              <option *ngFor="let opcion of listaDivisiones" [value]="opcion.CODIGO">
                                  {{opcion.NEMONICO | uppercase}}
                              </option>
                          </select>
                                    </div>
									
									
									 <ng-content> 