					
						<script type="text/javascript">
							try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
						</script>

			
						
							<ul class="breadcrumb">
						
							{#
							   <a href="{{ url(dispatcher.getModuleName()~'/index/index') }}">{{ dispatcher.getModuleName() }}</a>
							#}
								
							
							 <li>  <a href="{{ url(dispatcher.getModuleName()~''~dispatcher.getControllerName()~'/index') }}"><span style="text-transform: capitalize;">{{ dispatcher.getControllerName() }}</span></a></li>
							 <li>	&nbsp;<a href="{{ dispatcher.getActionName() }}"><span style="text-transform: capitalize;">{{ dispatcher.getActionName() }}</span></a> </li> 
							</ul>

						