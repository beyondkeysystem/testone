<!--Investment in Real Estate-->
<div class="invest">
  <div class="wrapper">
    <div class="invest_content">
      <h2><?php echo ($this->lang->line('home_page_invest_title')); ?></h2>
      <p><?php echo ($this->lang->line('home_page_invest_description')); ?></p>
      <ul class="numbers">
        <li>
          <h2><?php echo $count_invester; ?></h2>
          <p><?php echo ($this->lang->line('home_page_invest_success_customers_title')); ?></p>
        </li>
        <li>
          <h2><?php echo $total_property; ?></h2>
          <p><?php echo ($this->lang->line('home_page_invest_top_estates_title')); ?></p>
        </li>
        <li>
          <h2><?php echo $count_owned_property; ?></h2>
          <p><?php echo ($this->lang->line('home_page_investors_in_group_title')); ?></p>
        </li>
        <li>
          <h2><?php if(empty($total_earning) or $total_earning < 0){echo 0;} else { echo $total_earning;} ?></h2>
          <p><?php echo ($this->lang->line('home_page_success_projects_title')); ?></p>
        </li>
      </ul>
    </div>
  </div>
</div>
<!--/.Investment in Real Estate--> 