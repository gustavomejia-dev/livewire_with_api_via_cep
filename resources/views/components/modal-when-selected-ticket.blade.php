<section class="fixed h-1/2 top-11 w-[25%] mx-[40%] rounded-lg p-12 border-2 border-zinc-300 bg-slate-200" 
                x-show='showModal' @click.away="showModal = false">
                <form action="{{route('updateTicket')}}" method="post">
                    @csrf
                    @method('post')
                        <div class="justify-center relative">
                            <input type="hidden" name="id" id="inputId"/>
                            <div class="relative z-0 mb-6 group h-auto w-[90%]">
                                <input type="text" value = "" name="email" id="floating_email" class="block py-2.5 px-0 w-[90%] text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "/>
                                <label for="email" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email</label>
                            
                            </div>
                            <div class="relative z-0 mb-6 group h-auto w-[90%]">
                            <div class="relative z-0 w-full mb-6 group">
                                <input value = "" type="text" name="nome_remetente" id="floating_first_name" class="w-[90%] block py-2.5 px-0 text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                <label for="floating_first_name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nome</label>
                                
                                </div>
                            </div>
                            

                            <div class="w-[90%]">

                            <label for="comment" class="px-2 sr-only">Detalhes</label>
                            <textarea value = "" id="comment" name="texto" rows="4" class="w-[90%] rounded-lg px-2 text-sm text-gray-900 bg-white border-0 dark:bg-gray-800 focus:ring-0 dark:text-white dark:placeholder-gray-400" placeholder="Descreva o problema" ></textarea>
                    

                            </div>
                                <div class="w-1/2">
                                    <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                                    <select id="status-ticket" name = 'status' class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        
                                        <option value = "" selected>Selecione o Status</option>
                                        <option value="R">Resolvido</option>
                                        <option value="P">Pendente</option>
                                        <option value="A">Aberto</option>
                                    </select>
                                </div>
                                <button type="submit" class="mt-3 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Editar Ticket</button>
                            </div>
                        
                    </div>  
            </form>
        </section> 