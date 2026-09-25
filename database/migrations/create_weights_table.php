public function up(): void
{
    Schema::create('weights', function (Blueprint $table) {
        $table->id();
        $table->decimal('weight', 5, 2);
        $table->date('recorded_date'); // 
        $table->timestamps();
    });
}